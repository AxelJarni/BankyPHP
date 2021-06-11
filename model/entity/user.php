<?php

class User {
    protected string $lastname;
    protected string $firstname;
    protected string $email;
    protected string $city;
    protected int $cityCode;
    protected string $sex;
    protected string $password;
    protected string $birthdate;
  
    

    public function getLastname()
  {
      return $this->lastname;
  }


  public function setLastname(?string $lastname)
  {
      $this->lastname = $lastname;

      return $this;
  }

  public function getFirstname()
  {
      return $this->firstname;
  }


  public function setFirstname(?string $firstname)
  {
      $this->firstname = $firstname;

      return $this;
  }

  public function getEmail()
  {
      return $this->email;
  }


  public function setEmail(?string $email)
  {
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->email = $email;
        return $this;
      }
      throw new Exception("Format d'email incorrect");
  }

  public function getCity()
  {
      return $this->city;
  }


  public function setCity(?string $city)
  {
      $this->city = $city;

      return $this;
  }

  public function getCityCode()
  {
      return $this->cityCode;
  }


  public function setCityCode(?int $cityCode)
  {
      $this->cityCode = $cityCode;

      return $this;
  }

  public function getSex()
  {
      return $this->sex;
  }


  public function setSex(?string $sex)
  {
      $this->sex = $sex;

      return $this;
  }

  public function getPassword()
  {
      return $this->password;
  }


  public function setPassword(?string $password)
  {
      $this->password = $password;

      return $this;
  }

  public function getBirthdate()
  {
      return $this->birthdate;
  }


  public function setBirthdate(?string $birthdate)
  {
      $this->birthdate = $birthdate;

      return $this;
  }



?>