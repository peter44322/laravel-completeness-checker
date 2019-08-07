<?php


namespace Peterzaccha\CompletenessChecker\Traits;


trait HasCompleteness
{
  //  public $requiredForCompleteness = [];

    public function isComplete(){
        foreach ($this->requiredForCompleteness as $field){
            if ($this->$field === null || $this->$field === ""){
                return false;
            }
        }
        return true;
    }

}
