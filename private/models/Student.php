<?php

/**
 * Student Model
 */
class Student extends Model
{
    protected $allowedColumns = [
        'firstname',
        'lastname',
        'email',
        'date',
        'IdClasse',
        'password',
        'image',
        'CNE',
        'CIN'
    ];

    protected $beforeInsert = [
        'hash_password'
    ];

    public function validate($DATA)
    {
        $this->errors = array();

        // Check for first name
        if (empty($DATA['firstname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['firstname'])) {
            $this->errors['firstname'] = "Only letters allowed in first name";
        }

        // Check for last name
        if (empty($DATA['lastname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['lastname'])) {
            $this->errors['lastname'] = "Only letters allowed in last name";
        }

        // Check for email
        if (empty($DATA['email']) || !filter_var($DATA['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Email is not valid";
        }

        // Check if email exists
        if ($this->where('email', $DATA['email'])) {
            $this->errors['email'] = "That email is already in use";
        }

        // Check for password
        if (empty($DATA['password']) || $DATA['password'] !== $DATA['password2']) {
            $this->errors['password'] = "Passwords do not match";
        }

        // Check for password length
        if (strlen($DATA['password']) < 8) {
            $this->errors['password'] = "Password must be at least 8 characters long";
        }

        // No errors, validation is successful
        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }

    public function hash_password($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $data;
    }
}
