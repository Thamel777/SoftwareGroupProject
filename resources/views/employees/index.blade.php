<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
</head>
<body>
    <h1>Employee Details</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}} <!-- 'success' from EmployeeController-->
            </div>
        @endif()
    </div>
    <div>
        <div>
           <a href="{{route('employee.create')}}">Add a new employee</a> 
        </div>
        <table border="1">
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Home Address</th>
                <th>Email</th>
                <th>Joined Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($employees as $employee) <!-- $employees from EmployeeController 'employees', "($employees as $employee)"loops through each employee-->
                <tr>
                    <td>{{$employee->emp_name}}</td>
                    <td>{{$employee->birthday}}</td>
                    <td>{{$employee->gender}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>{{$employee->address}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->joined_date}}</td>
                    <td>                           <!--This $employee is passed to this 'employee' from route {employee},, "['employee' => $employee]" array -->
                        <a href="{{route('employee.edit', ['employee' => $employee])}}">Edit</a>
                    </td><!-- loop through each iteam and put edit link-->
                    
                    <!--To delete data, use form-->
                    <td> <!--In Laravel, do not create a link directly in action, instead use a route name to generate a link-->
                        <form method="post" action="{{route('employee.destroy', ['employee' => $employee])}}"> <!-- say what employee you want to delete-->
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>