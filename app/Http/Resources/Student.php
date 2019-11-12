<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Student extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        // return [
        //     'Student id' => $this->id,
        //     'first name' => $this->fname,
        //     'last name' => $this->lname,
        //     'Course' => $this->course,
        //     'Section' => $this->section,
        //     'created date' => $this->created_at,
        //     'updated date' => $this->updated_at,
        // ];


        $students = array('Student id' => $this->id,
            'first name' => $this->fname,
            'last name' => $this->lname,
            'Course' => $this->course,
            'Section' => $this->section,
            'created date' => $this->created_at,
            'updated date' => $this->updated_at,
        );
        return $students;
    }
}
