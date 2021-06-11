<?php

class Account {
    protected int $id;
    protected int $amount;
    protected string $opening_date;
    protected string $account_type;
    protected int $user_id;

    public function setId(?int $id) {
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setAmount(?int $amount) {
        $this->amount = $amount;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setOpening_date(?int $opening_date) {
        $this->opening_date = $opening_date;
    }
    
    public function getOpening_date() {
        return $this->opening_date;
    }

    public function setAccount_type(?int $account_type) {
        $this->account_type = $account_type;
    }
    
    public function getAccount_type() {
        return $this->account_type;
    }

    public function setUser_id(?int $user_id) {
        $this->user_id = $user_id;
    }

    public function getUser_id(){
        return $this->user_id;
    }

    public function hydrate(?array $data) {
        foreach ($data as $key => $value) {
            $method = "set". ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function __construct(?array $data = null) {
        if($data) {
            $this->hydrate($data);
        }
    }

}


?>