<?php

namespace App\Controller;

use App\Foundation\Request;
use App\Foundation\ViewRenderer;
use PDOException;
use PDO;
class AddPageController
{
    private $errors = array('name' => '', 'email' => '', 'hobbies' => '');
    private $values = array('name' => '', 'email' => '', 'hobbies' => '');

    public function __construct(private ViewRenderer $viewRenderer, private PDO $pdo)
    {
    }

    public function execute(Request $request): string
    {
        return $this->viewRenderer->render('addUser', ["errors" => $this->errors, "values" => $this->values]);
    }

    public function submittUserDataByPost(Request $request): string
    {
        if(isset($_POST['submit'])) {
            $this->checkName();
            $this->checkEmail();
            $this->checkHobbies();

            // if no input error is encountered
            if(!array_filter($this->errors)) {
                try {
                    $stmt = $this->pdo->prepare("INSERT INTO users(name, hobbies) VALUES(:name, :hobbies)");
                    $stmt->bindValue(':name', $this->values['name']);
                    $stmt->bindValue(':hobbies', $this->values['hobbies']);
                    $stmt->execute();
                    $message = sprintf($_ENV['USER_STORED'], $this->values['name']);
                    return $this->viewRenderer->render('postResult', ["successMessage"=> $message,
                        "exceptionMessage" => '']);
                } catch (PDOException $e) {
                    echo $this->viewRenderer->render('postResult', ['exceptionMessage' => $e->getMessage(),
                        'errorMessage'=> $_ENV['USER_NOT_STORED']]);
                    exit(1);
                }
            }
        }

         return $this->viewRenderer->render('addUser', ["errors" => $this->errors, "values" => $this->values]);
    }

    private function checkName(): void
    {
        if (empty($_POST['name']) || !preg_match('/^[a-zA-Z\s]+$/', $_POST['name']))
        {
            $this->errors['name'] = 'Field is empty or invalid. Use only letters and spaces';
        }
        $this->values['name'] = htmlspecialchars($_POST['name']);
    }

    private function checkEmail(): void
    {
        if ( empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
        {
            $this->errors['email'] = 'Field is empty or invalid. Insert a valid email';
        }
        $this->values['email'] = htmlspecialchars($_POST['email']);
    }

    private function checkHobbies(): void
    {
        if ( empty($_POST['hobbies']) || !preg_match('/^[a-zA-Z\s]+$/', $_POST['hobbies']) )
        {
            $this->errors['hobbies'] = 'Field is empty or invalid. Use only letters and spaces';
        }
        $this->values['hobbies'] = htmlspecialchars($_POST['hobbies']);
    }
}