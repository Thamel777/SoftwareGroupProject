<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add employee</title>
</head>
<body>
    <h1>Add a new employee</h1>
    <div>
        @if($errors->any()) <!--if there is any error-->
        <ul>
            @foreach ($errors->all() as $error) <!-- for all errors-->
                <li>{{$error}}</li> <!-- we printout each error-->
            @endforeach
        </ul>


        @endif
    </div>
    <form method="post" action="{{ route('employee.store') }}">
        @csrf
        @method('post')
        <div>
            <label for="emp_name">Employee name: </label>
            <input type="text" name="emp_name">
        </div><br>
        <div>
            <label for="birthday">Birthday: </label>
            <input type="date" name="birthday">
        </div><br>
        <div>
            <label for="gender">Gender: </label>
            <select id="gender" name="gender" required>
                <option value="blank"></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div><br>
        <div>
            <label for="phone">Phone number: </label>
            <input type="string" name="phone" maxlength="10">
        </div><br>
        <div>
            <label for="address">Home Address: </label>
            <input type="text" name="address" >
        </div><br>
        <div>
            <label for="email">Email Address: </label>
            <input type="string" name="email" >
        </div><br>
        <div>
            <label for="job_type">Job Title : </label>
            <select id="job_type" name="job_type" required>
                <option value="cashier_employee">Cashier</option>
                <option value="salon_employee">Salon worker</option>
            </select>
        </div><br> 
        <div>
            <label for="joined_date">Joined Date: </label>
            <input type="date" name="joined_date">
        </div><br>

        <div>
            <button type="submit" class="btn btn-primary" style="background-color:rgb(20, 110, 255); color:blanchedalmond">
                {{ __('Add Employee') }}
            </button>
        </div>
        
    </form>
</body>
</html>