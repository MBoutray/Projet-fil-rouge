<?php
namespace App\Model;
use Core\Database;

class PollModel extends Database {
    /**
     * Get all the polls of a user by his id
     *
     * @param integer $userID
     * @return array
     */
    public function GetPollsOfUser(int $userID) : array {
        return $this->query("SELECT * FROM poll WHERE creator_id = $userID ORDER BY CREATION_DATE DESC;");
    }

    /**
     * Get all the polls the user has answered
     *
     * @param integer $userID
     * @param boolean $includeExpired
     * @return array
     */
    public function GetUsersAnsweredPolls(int $userID, bool $includeExpired = false) : array {
        return $this->query("SELECT p.poll_id, creator_id, p.title, p.category_id, name as category_name, END_DATE, CREATION_DATE, entry_id FROM poll p INNER JOIN poll_entry pe ON p.poll_id = pe.poll_id INNER JOIN category c ON p.category_id = c.category_id WHERE user_id = $userID" . ($includeExpired ? ";" : " AND END_DATE > CURRENT_DATE();"));
    }

    /**
     * Get all the data of a particular poll, can choose to get the entries too
     *
     * @param integer $pollID
     * @param boolean $includeEntries
     * @return array
     */
    public function GetPollData(int $pollID, bool $includeEntries = false) : array {
        if($includeEntries) {
            return array($this->query("SELECT * FROM poll WHERE poll_id = $pollID;", true), 
                         $this->query("SELECT pe.entry_id, pe.poll_id, user_id, score, pa.answer_id, ua.poll_answer_id, title, is_correct FROM poll_entry pe  INNER JOIN user_answer ua ON pe.entry_id = ua.entry_id INNER JOIN poll_answer pa ON ua.poll_answer_id = pa.answer_id WHERE pa.poll_id = $pollID;"));
        } else {
            return $this->query("SELECT * FROM poll WHERE poll_id = $pollID;", true);
        }
    }

    /**
     * Get all the polls of a particular category
     *
     * @param integer $categoryID
     * @param integer $quantityOfPolls
     * @return array
     */
    public function GetPollsFromCategory(int $categoryID, int $quantityOfPolls = null) : array {
        return $this->query("SELECT poll_id, creator_id, title, END_DATE, CREATION_DATE FROM poll p INNER JOIN category c ON p.category_id = c.category_id WHERE p.category_id = 1 ORDER BY CREATION_DATE DESC" . (is_null($quantityOfPolls) ? ";" : " LIMIT $quantityOfPolls;"));
    }

    /**
     * Method to create a poll
     *
     * @param integer $userID
     * @param string $title
     * @param integer $categoryID
     * @param string $deadline
     * @param array $questions
     * @return void
     */
    public function CreatePoll(int $userID, string $title, int $categoryID, string $deadline, array $questions) {
        //Si le nombre de questions est correct
        if(count($questions) >= 2 && count($questions) <= 4) {
            //Create the poll itself
            $this->prepare("INSERT INTO poll(creator_id, title, category_id, END_DATE) VALUES(:userID, :title, :categoryID, :deadline", array(':userID' => $userID, ':title' => $title, ':categoryID' => $categoryID, ':deadline' => $deadline));
            $lastID = $this->getLastInsertId(); //Get its generated id

            //Create all the corresponding poll questions
            foreach ($questions as $question) {
                $this->prepare("INSERT INTO poll_answer(poll_id, title, is_correct) VALUES(:lastID, :title, :isCorrect);", array(':lastID' => $lastID, ':title' => $question['title'], ':isCorrect' => $question['isCorrect']));
            }
        }
    }

    /**
     * Create a new entry for a specific poll
     *
     * @param integer $userID
     * @param integer $pollID
     * @param integer $answerID
     * @return void
     */
    public function AnswerPoll(int $userID, int $pollID, int $answerID) {
        //Create the new poll entry
        $this->prepare("INSERT INTO poll_entry(poll_id, user_id) VALUES(:pollID, :userID);", array(':pollID' => $pollID, ':userID' => $userID));

        //Get the last inserted ID
        $lastID = $this->getLastInsertId();

        //Create the new user answer
        $this->prepare("INSERT INTO user_answer(entry_id, poll_answer_id) VALUES(:entryID, :pollAnswer);", array(':entryID' => $lastID, ':poll_answer_id' => $answerID));
    }
}