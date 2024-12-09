<?php 
include "connect.php";
include "header.php";
include "header-admin.php";
if (!isset($_SESSION['user_id'])) {
  header('location:index.php');
  exit;
} else {
  if ($_SESSION['role'] == 2) {
    header('location:index.php');
    exit;
  }
}
?> 

<style>
  .main-content{
    margin-top:60px;

  }
</style>
    <!-- Content Starts Here -->
    <div class="main-content ">
      <!-- Add User Button -->
      <div class="text-end mb-3 mt-5">
        <h1 id="manage" class=" text-center mt-5">Manage Users</h1>

        <button
          class="btn btn-primary"
          data-bs-toggle="modal"
          data-bs-target="#addUserModal"
        >
          Add User
        </button>
      </div>

      <!-- User Table -->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
<?php
// Read all users
$sql = "SELECT * FROM Users ORDER BY name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
          <tr>
            <td><?=$row["user_id"]?></td>
            <td><?=$row["name"]?></td>
            <td><?=$row["email"]?></td>
            <td><?=($row["role"] == 1? 'Admin':'User')?></td>
            <td>
              <button class="btn btn-warning btn-sm edituser" data-bs-toggle="modal" data-bs-target="#editUserModal" data-user-id="<?=$row["user_id"]?>">Edit</button>
              <button class="btn btn-danger btn-sm deleteuser" data-bs-toggle="modal" data-bs-target="#deleteUserModal" data-user-id="<?=$row["user_id"]?>">Delete</button>
            </td>
          </tr>
<?php 
    }
} else {
?>
    <tr><td colspan="5">No users found</td></tr>
<?php
}
?>
          <!-- PHP: Loop to display users dynamically -->
        </tbody>
      </table>

      <!-- Add User Modal -->
      <div
        class="modal fade"
        id="addUserModal"
        tabindex="-1"
        aria-labelledby="addUserModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <!-- Add User Form -->
              <form action="add_user.php" method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label">Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="username"
                    placeholder="Enter name"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="useremail" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    name="useremail"
                    placeholder="Enter email"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="userpassword" class="form-label">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    name="userpassword"
                    placeholder="Enter password"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="userphone" class="form-label">Phone</label>
                  <input
                    type="text"
                    class="form-control"
                    name="userphone"
                    placeholder="Enter phone"/>
                </div>
                <div class="mb-3">
                  <label for="useraddress" class="form-label">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    name="useraddress"
                    placeholder="Enter address"/>
                </div>
                <div class="mb-3">
                  <label for="usercity" class="form-label">City</label>
                  <input
                    type="text"
                    class="form-control"
                    name="usercity"
                    placeholder="Enter city"/>
                </div>
                <div class="mb-3">
                  <label for="userrole" class="form-label">Role</label>
                  <select
                    class="form-select"
                    name="userrole"
                    required
                  >
                    <option value="">Select User</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                  </select>
                </div>
                <button type="submit" name="adduser" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit User Modal -->
      <div
        class="modal fade"
        id="editUserModal"
        tabindex="-1"
        aria-labelledby="editUserModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <!-- Add User Form -->
              <form action="edit_user.php" method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label">Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter name"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="useremail" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="useremail"
                    name="useremail"
                    placeholder="Enter email"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="userphone" class="form-label">Phone</label>
                  <input
                    type="text"
                    class="form-control"
                    id="userphone"
                    name="userphone"
                    placeholder="Enter phone"/>
                </div>
                <div class="mb-3">
                  <label for="useraddress" class="form-label">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    id="useraddress"
                    name="useraddress"
                    placeholder="Enter address"/>
                </div>
                <div class="mb-3">
                  <label for="usercity" class="form-label">City</label>
                  <input
                    type="text"
                    class="form-control"
                    id="usercity"
                    name="usercity"
                    placeholder="Enter city"/>
                </div>
                <div class="mb-3">
                  <label for="userrole" class="form-label">Role</label>
                  <select
                    class="form-select"
                    id="userrole"
                    name="userrole"
                    required
                  >
                    <option value="">Select User</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                  </select>
                </div>
                <input type="hidden" name="userid" id="userid">
                <button type="submit" name="updateuser" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete User Modal -->
      <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <!-- Add User Form -->
              <form action="delete_user.php" method="POST">
                <div class="mb-3">
                  <label class="form-label">Are you sure?</label>
                </div>
                <input type="hidden" name="deleteuserid" id="deleteuserid">
                <button type="submit" name="updateuser" class="btn btn-primary">Delete</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php 
include("footer-admin.php");
?>
<script>
  $(document).ready(function(){
    $(".edituser").click(function(){
      var userId = $(this).data('user-id');
      $.ajax({
          url : "get_user_details.php",
          type: "POST",
          data : { 'userid':userId },
          dataType: "json",
          success: function(data)
          {
              $("#username").val(data.name);
              $("#useremail").val(data.email);
              $("#userphone").val(data.phone);
              $("#useraddress").val(data.address);
              $("#usercity").val(data.city);
              $("#userrole").val(data.role);
              $("#userid").val(data.user_id);
          }
      });
    })

    $(".deleteuser").click(function(){
      var userId = $(this).data('user-id');
      $("#deleteuserid").val(userId);
    });
  })
</script>