<?php

class Operation {
    protected int $id;
    protected string $operation_type;
    protected int $operation_amount;
    protected string $registered;
    protected string $label;
    protected int $account_id;
    

    public function setId(?int $id) {
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setOperation_type(?string $operation_type) {
        $this->operation_type = $operation_type;
    }

    public function getOperation_type(){
        return $this->operation_type;
    }

    public function setOperation_amount(?int $operation_amount) {
        $this->operation_amount = $operation_amount;
    }

    public function getOperation_amount(){
        return $this->operation_amount;
    }

    public function setRegistered(?string $registered) {
        $this->registered = $registered;
    }

    public function getRegistered(){
        return $this->registered;
    }

    public function setLabel(?string $label) {
        $this->label = $label;
    }

    public function getLabel(){
        return $this->label;
    }

    public function setAccount_id(?int $account_id) {
        $this->account_id = $account_id;
    }

    public function getAccount_id(){
        return $this->account_id;
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