<?php

use Illuminate\Support\Facades\Route;


//This route is the home page that displays the project list.
Route::get('/', function(){
    $sql = "select * from project";
    $projects = DB::select($sql);
    return view('project_list')->with('projects', $projects);
});

//This route is for displaying the details of each project and lists all students that have applied.
Route::get('project_detail/{projectID}', function($projectID){
    $project = get_project($projectID);
    $students = (array) get_project_student_name($projectID);
    $applications = get_project_application($projectID);
    return view('project_detail')->with('project', $project)->with('students', $students)->with('applications', $applications);
});

//This route is for displaying the top 3 industry partners and the no. of projects they advertise.
Route::get('/top_list', function(){
    $sql = "SELECT comName, count(comName) AS number from project group by comName order by count(*) desc limit 3;";
    $tops = DB::select($sql);
    return view('top_list')->with('tops', $tops);
});

//This route is for displaying the list of students.
Route::get('/student_list', function(){
    $sql = "select * from student";
    $students = DB::select($sql);
    return view('student.student_list')->with('students', $students);
});

//This route is for displaying the list of projects the student has applied.
Route::get('student_detail/{studentID}', function($studentID){
    $student = get_student($studentID);
    $studentapps = get_student_application($studentID);
    return view('student.student_detail')->with('student', $student)->with('studentapps', $studentapps);
});

//This route is the project register page for the industry to advertise a project.
Route::get('add_project', function(){
    return view("add_project");
});

//This part is the action of adding new project, getting variables by post method,
//and pass thoses to add_project function, 
//then redirect to the project details page.
Route::post('add_project_action', function() {
    $projectID = request("projectID");
    $projectTitle = request("projectTitle");
    $description = request("description");
    $numOfStudentRequired = request("numOfStudentRequired");
    $comName = request("comName");
    $location = request("location");
    $major = request("major");
    $id = add_project($projectID, $projectTitle, $description, $numOfStudentRequired, $comName, $location, $major);
    set_numOfAvailableSlot($id); 

    return redirect(url("project_detail/$id"));
});

//This route used to call up the project detail to edit.
Route::get('project_update/{projectID}', function($projectID){
    $project = get_project($projectID);
    return view('update_project')->with('project', $project);
});

//This route is doing the update action, by getting the edited project detail,
//and pass them to update_project function to update in the database.
Route::post('update_project_action', function() {
    $projectID = request("projectID");
    $projectTitle = request("projectTitle");
    $major = request("major");
    $description = request("description");
    $numOfStudentRequired = request("numOfStudentRequired");
    $project = update_project($projectID, $projectTitle, $major, $description, $numOfStudentRequired);
    return redirect(url("project_detail/$projectID")); 
});

//This route used to call up the project to delete.
Route::get('delete_project/{projectID}', function($projectID){
    $project = get_project($projectID);
    return view('delete_project')->with('project', $project);
});

//This route is doing the delete action.
Route::post('delete_project_action', function() {
    $projectID = request("projectID");
    delete_project($projectID);
    return redirect(url("/"));
});

//This route shows the form for students to apply for the project.
Route::get('add_application/{projectID}', function($projectID){
    $project = get_project($projectID);
    //dd($project);
    $msgError = "";
    return view("application.add_application")->with('project', $project)->with('msgError', $msgError);
});

//This part is the action of adding new application, adding new student into student list,
//updating the no. of application of each student, updating the no. of applicant of each project,
//assiging students to the project, updating the no. of available slots of each project.
//All variables are getting by post method and passed to add_application function, 
//then redirect to the project details page.
Route::post('add_application_action', function() {    
    $msgError = "";
    $projectID = request("projectID");
    $firstName = request("firstName");
    $lastName = request("lastName");
    $preference = request("preference");
    $justification = request("justification");

    if (empty($firstName) or empty($lastName) or empty($justification)){
    die("Application: Error: All fields cannot be empty.");}
    if (strlen($firstName) <3 || strlen($lastName) <3 || !ctype_alpha($firstName) || !ctype_alpha($lastName)){
        $msgError = "Error: Check Name Field";
        return view("application.add_application")->with('msgError', $msgError)->with('projectID', $projectID);}
    if (str_word_count($justification) < 5){
        $msgError = "Error: Check Justification Field";
        return view("application.add_application")->with('msgError', $msgError)->with('projectID', $projectID);}

    $existStudent = check_exist_student($firstName, $lastName);
    $app_existStudent = check_app_exist_student($projectID, $firstName, $lastName);
    if (count($app_existStudent) > 0){
        die("You can only apply once.");
    }else{
        if (count($existStudent)!= 1)
        {
            $studentID = add_student_list($firstName, $lastName);
            $id = add_application($projectID, $studentID, $justification, $preference);
            update_numOfApplication($studentID);
            update_numOfApplicant($projectID);    
        }
        else{
            $existStudentID = get_student_id($firstName, $lastName);
            $studentID = $existStudentID->studentID;
            $limit = check_limit_application($studentID);
            if (count($limit) == 3){
                die("You can only apply up to 3 projects.");
            }

            $id = add_application($projectID, $studentID, $justification, $preference);
            update_numOfApplication($studentID);
            update_numOfApplicant($projectID);
        }    
        $applicationID = $id;
        $numOfAvailableSlot = get_numOfAvailableSlot($projectID);
        $numOfAvailableSlot = $numOfAvailableSlot->numOfAvailableSlot;
        if($numOfAvailableSlot > 0)
            if ($preference = 1){
                assign_student($projectID, $applicationID, $preference);
                update_numOfAvailableSlot($projectID);
            } elseif ($preference = 2){
                assign_student($projectID, $applicationID, $preference);
                update_numOfAvailableSlot($projectID);
            } else {
                assign_student($projectID, $applicationID, $preference);
                update_numOfAvailableSlot($projectID);
            }
        else {
            die("This project is full. You will be in waiting list");
        }
    }
    return redirect(url("project_detail/$projectID")); 
});

//This route is for displaying the assignment of projects to students.
Route::get('/assignment', function(){
    $sql1 = "select PA.projectID, PA.pjAssignmentID, PA.applicationID, S.firstName, S.lastName from student AS S, application AS A, project AS P, ProjectAssignment AS PA where p.projectID = PA.projectID AND A.studentID = S.studentID AND A.applicationID = PA.applicationID ORDER BY PA.projectID";
    $assignments = DB::select($sql1);
    return view('assignment')->with('assignments', $assignments);
});

//This route is for displaying the student's justification text for that application. 
Route::get('/justification/{studentID}', function($studentID){
    $sql = "select justification from application where studentID = ?";
    $justifications = DB::select($sql, array($studentID));
    $justifications = $justifications[0];
    return view('application.justification')->with('justifications', $justifications);
});

//This route is for the document.
Route::get('doc',function(){
    return view("doc");
});

//This function is to retrieve the students by passing in student ID.
function get_student($studentID) {
    $sql = "select * from student where studentID=?";
    $students = DB::select($sql, array($studentID));
    if (count($students) != 1){
        die("Something has gone wrong, invalid query or result: $sql");
    }
    $student = $students[0];
    return $student;
}

//This function is to retrieve the student ID by passing in first name and last name.
function get_student_id($firstName, $lastName) {
    $sql = "select studentID from student where firstName=? and lastName=?";
    $students = DB::select($sql, array($firstName, $lastName));
    $studentID = $students[0];
    return $studentID;
}

//This function is to check duplicate application.
function check_app_exist_student($projectID, $firstName, $lastName) {
    $sql = "select * from application AS A, student as S where a.studentID = s.studentID and a.projectID = ? and s.firstName = ? and s.lastName = ?;";
    $app_existStudent = DB::select($sql, array($projectID, $firstName, $lastName));
    return $app_existStudent;
}

//This function is to retrieve the project title and industry name of the applcation by passing in student ID.
function get_student_application($studentID) {
    $sql = "select projectTitle, comName from student, project, application where student.studentID = application.studentID and application.projectID = project.projectID and student.studentID = ?";
    $studentapps = DB::select($sql, array($studentID));
    return $studentapps;
}

//This function is to retrieve the student name of the applcation by passing in project ID.
function get_project_student_name($projectID) {
    $sql = "select * from student as s, application as a where s.studentID = a.studentID and a.projectID = ?";
    $students = DB::select($sql, array($projectID));
    return $students;
}

//This function is for adding new project and also doing the input validation of input data.
function add_project($projectID, $projectTitle, $description, $numOfStudentRequired, $comName, $location, $major){
    if (empty($projectTitle) or empty($description) or empty ($numOfStudentRequired) or empty($comName) or empty($location) or empty($major)){
            die("Add Project Error: All fields cannot be empty.");}
    $sql = "INSERT INTO PROJECT(projectID, projectTitle, description, numOfStudentRequired, comName, location, major) values (?, ?, ?, ?, ?, ?, ?)";
    DB::insert($sql, array($projectID, $projectTitle, $description, $numOfStudentRequired, $comName, $location, $major));
    $id = DB::getPdo()->lastInsertId();
    return($id);
}

//This function is to update the project details.
function update_project($projectID, $projectTitle, $major, $description, $numOfStudentRequired) {
    $sql = "update project set projectTitle = ?, major = ?, description = ?, numOfStudentRequired = ? where projectID = ?";
    DB::update($sql,array($projectTitle, $major, $description, $numOfStudentRequired, $projectID));

}

//This function is to delete the project and also all applications for that project.
function delete_project($projectID){
    $sql1 = "delete from application where projectID = ?";
    DB::delete($sql1,array($projectID));
    $sql2 = "delete from project where projectID = ?";
    DB::delete($sql2,array($projectID));
}

//This function is for adding new application.
function add_application($projectID, $studentID, $justification, $preference){
    $sql1 = "insert into application (projectID, studentID, justification, preference) values (?, ?, ?, ?)";
    DB::insert($sql1, array($projectID, $studentID, $justification, $preference));
    $id = DB::getPdo()->lastInsertId();
    return($id);
}

//This function is to retrieve all application.
function get_application($applicationID) {
    $sql = "select * from application where applicationID=?";
    $applications = DB::select($sql, array($applicationID));
    if (count($applications) != 1){
        die("Something has gone wrong, invalid query or result: $sql");
    }
    $application = $applications[0];
    return $application;
}

//This function is used to update number of application of each student.
function update_numOfApplication($studentID){
    $sql = "update student set numOfApplication = numOfApplication + 1 where studentID = ?";
    DB::update($sql, array($studentID));
}

//This function is used to update number of applicant received of each project.
function update_numOfApplicant($projectID){
    $sql = "update project set numOfApplicant = numOfApplicant + 1 where projectID = ?";
    DB::update($sql, array($projectID));
}

//This function is used to set number of available slots of new project.
function set_numOfAvailableSlot($projectID){
    $sql = "update project set numOfAvailableSlot = numOfStudentRequired where projectID = ?";
    DB::update($sql, array($projectID));
}

//This function is used to update number of available slots of each project.
function update_numOfAvailableSlot($projectID){
    $sql = "update project set numOfAvailableSlot = numOfAvailableSlot - 1 where projectID = ?";
    DB::update($sql, array($projectID));
}

//This function is used to add new student in the student list.
function add_student_list($firstName, $lastName){
    $sqlInsert = "insert into student (firstName, lastName) values (?, ?)";
    DB::insert($sqlInsert, array($firstName, $lastName));
    $studentID = DB::getPdo()->lastInsertId();
    return $studentID;
}

//This function is used to check if student has already applied for 3 projects.
function check_limit_application($studentID){
    $sql = "select * from application WHERE studentID = ?";
    $applicationLimit = DB::select($sql, array($studentID));
    return $applicationLimit;
}  

//This function is used to check if the student already exists in the database.
function check_exist_student($firstName, $lastName){
    $sql = "SELECT * FROM student AS S WHERE S.firstName LIKE ? AND S.lastName LIKE ?";
    $existStudent = DB::select($sql, array($firstName,$lastName));
    return $existStudent;
}  

//This function is used to assign students into project.
function assign_student($projectID, $applicationID, $preference){
    $sql1 = "insert into projectassignment (projectID, applicationID) values (?, ?)";
    DB::insert($sql1, array($projectID, $applicationID));
}

//This function is to retrieve the number of available slot.
function get_numOfAvailableSlot($projectID) {
    $sql = "select numOfAvailableSlot from project where projectID = ?";
    $number = DB::select($sql, array($projectID));
    $number = $number[0];
    return $number;
}

//This function is to retrieve all projects.
function get_project($projectID) {
    $sql = "select * from project where projectID=?";
    $projects = DB::select($sql, array($projectID));
    if (count($projects) != 1){
        die("Something has gone wrong, invalid query or result: $sql");
    }
    $project = $projects[0];
    return $project;
}

//This function is to retrieve all application.
function get_project_application($projectID) {
    $sql = "select * from application where projectID=?";
    $applications = DB::select($sql, array($projectID));
    if (count($applications) != 0){
        return $applications;
    } else {
        return null;
    }
}

