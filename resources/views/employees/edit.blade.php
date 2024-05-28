<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit details</title>
</head>
<body>
    <h1>Edit Employee Details</h1>
    <div>
        @if($errors->any()) <!--if there is any error-->
        <ul>
            @foreach ($errors->all() as $error) <!-- for all errors-->
                <li>{{$error}}</li> <!-- we printout each error-->
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{ route('employee.update', ['employee' => $employee]) }}">
        @csrf
        @method('put')

        
        <div>
            <label for="emp_name">Employee name: </label>
            <input type="text" name="emp_name" value="{{$employee->emp_name}}">
        </div><br>
        <div>
            <label for="birthday">Birthday: </label>
            <input type="date" name="birthday" value="{{$employee->birthday}}">
        </div><br>
        <div>
            <label for="gender">Gender: </label>
            <input type="string" name="gender" value="{{$employee->gender}}">
            </select>
        </div><br>
        <div>
            <label for="phone">Phone number: </label>
            <input type="string" name="phone" maxlength="10" value="{{$employee->phone}}">
        </div><br>
        <div>
            <label for="address">Home Address: </label>
            <input type="text" name="address" value="{{$employee->address}}">
        </div><br>
        <div>
            <label for="email">Email Address: </label>
            <input type="string" name="email" value="{{$employee->email}}">
        </div><br>
      
        <div>
            <label for="joined_date">Joined Date: </label>
            <input type="date" name="joined_date" value="{{$employee->joined_date}}">
        </div><br>
        <div>
            <p>Check all the details before saving changes.</p>
        </div>
        <div>
            <button type="submit" class="btn btn-primary" style="background-color:rgb(20, 110, 255); color:blanchedalmond">
                {{ __('Save Changes') }}
            </button>
        </div>
        
    </form>
</body>
</html>