<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [

    '/home' => 'controllers/home/home.controller.php',
    '/trainers' => 'controllers/trainers/trainer.controller.php',
    '/create_class' => 'controllers/classes/class.create.controller.php',
    '/update_class' => 'controllers/classes/class.update.controller.php',
    '/classes' => 'controllers/classes/class.controller.php',
    '/edit_profile' => 'controllers/profiles/edit_profile.controller.php',
    '/archive' => 'controllers/classes/archive.view.controller.php',
    '/teacher' => 'controllers/teachers/teacher.controller.php',
    '/teacher-student' => 'controllers/teachers/teacher_student.controller.php',
    '/calendar' => 'controllers/calendar/calendar.controller.php',

    // todos
    '/todo' => 'controllers/todos/todo.controller.php',
    '/missing' => 'controllers/todos/todo_missing.controller.php',
    '/done' => 'controllers/todos/todo_done.controller.php',
    
  
    // assignment
    '/stream' => 'controllers/assignment/stream/stream.contorller.php',
    '/instruction' => 'controllers/assignment/stream/instruction/instruction.controller.php',
    '/student_work' => 'controllers/assignment/stream/student_work/student_work.controller.php',
    '/classwork' => 'controllers/assignment/classworks/classwork.controller.php',
    '/create-work' => 'controllers/assignment/classworks/create_classwork.controller.php',
    '/people' => 'controllers/assignment/peoples/people.controller.php',
    '/grade' => 'controllers/assignment/grades/grade.controller.php',
    '/what-todo' => 'controllers/assignment/grades/what-todo.controller.php',
    '/assignment_student' => 'controllers/assignment/assignment_student/assignment_student.cotroller.php',

    //students
    '/student' => 'controllers/students/student.controller.php',
    '/student_message' => 'controllers/message/student_message.controller.php',
    '/teacher_message' => 'controllers/message/teacher_message.controller.php',



    //teacher 
    '/teacher_join' => 'controllers/teachers/teacher_join_class/teacher.controller.php',
    '/submit' => "controllers/assignment/assignment_student/submit-controller.php",

    // comment private
    '/comment_private' => 'views/comments/teacher_comment_private.view.php',

];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
    http_response_code(404);
    $page = 'views/errors/404.php';
}
require "layouts/header.php";
require "layouts/navbar.php";
require $page;
require "layouts/footer.php";
