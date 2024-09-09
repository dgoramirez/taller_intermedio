<?php
namespace Task\Models;

class Task {
    //Atributos
    private string $descri;
    private string $date;
    private bool $state;

    //Magic Methods
    public function __construct(string $descri, string $date, bool $state) {
        $this->descri = $descri;
        $this->date= $date;
        $this->state = $state;
    }

    //Getters
    public function getDescri() {
        return $this->descri;
    }

    public function getDate() {
        return $this->date;
    }

    public function getState() {
        return $this->state;
    }

    //Setters
    public function setDescri(string $descri) {
        $this->descri = $descri;
    }

    public function setDate(string $date) {
        $this->date = $date;
    }

    public function setState(bool $state) {
        $this->state = false;
    }

    public function toArray() {
        return [
            'descri' => $this->descri,
            'date' => $this->date,
            'state' => $this->state
        ];
    }
}