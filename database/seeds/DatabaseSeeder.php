<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Eloquent::unguard();
    $this->call('UsersTableSeeder');
    $this->call('TutorsStudentsSeeder');
    $this->call('SubjectSeeder');
    $this->call('LessonsSeeder');
  }
}
?>
