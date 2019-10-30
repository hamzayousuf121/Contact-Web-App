function func(){
    var country = document.getElementById("country");
    if(country.value === "pakistan"){
        document.getElementById("phone").value = "+92";
    }
    else if(country.value === "uk"){
        document.getElementById("phone").value = "+44"
    }
    else if(country.value === "canada"){
        document.getElementById("phone").value = "+1"
    }
}
function Et(e){
document.getElementById("table").innerHTML = `
    <tbody>  
    <tr>
        <td><?php echo $data['id'];?></td>
        <td><?php echo $data['uname'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['company'];?></td>
        <td><?php echo $data['phone'];?></td>
        <td><?php echo $data['notes'];?></td>
        <td><input type="submit" name="edit" class="btn btn-success">Edit</td>
        <td><input type="submit" name="delete"class="btn btn-danger">Delte</td>
      </tr>
    </tbody>
    `
}
function Delete(e){
    `<?php 
    $query = "DELETE * from user_data where id=${e}`;
    $record = mysqli_query($con, $query);
    if($record){
        echo `Record has been delted`;
        `?>`
    }
}
