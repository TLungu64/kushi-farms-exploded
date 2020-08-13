<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="row mt-5" v-if="$gate.isAdmin()">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>

                <div class="card-tools">
                <button class='btn btn-success' @click="newModal" >Add new <i class=" fas fa-user-plus fa-fw"></i>    
                </button>  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <!-- table to display all the users available in the database -->
                <table class="table table-hover text-nowrap">
                  <thead>

                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Bio</th>
                      <th>Organisation</th>
                      <th>Registered At</th>
                      <th>Modify</th>
                    </tr>

                  </thead>

                  <tbody>

                    <tr v-for="user in users.data" :key="user.id">
                      <td>{{user.id}}</td>
                      <td>{{user.firstname}} {{user.lastname}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.type | upText}}</td>
                      <td>{{user.bio}}</td>
                      <td>{{user.organisation}}</td>
                      <td>{{user.created_at | myDate}}</td>
                      <td>
                          <a href="#" @click ="editUser(user)">
                          <i class="fa fa-edit"></i>
                      </a>
                      /
                      <a href="#" @click="deleteUser(user.id)">
                          <i class="fa fa-trash red"></i>
                      </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>  
              <!-- /.card-body -->
              <div class="card-footer">
                <pagination :data="users"
                @pagination-change-page="getResults"></pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        </div>
    
    <div v-if="!$gate.isAdmin()">
      <not-found></not-found>
    </div>
        <!--addnew Modal -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" v-show="editmode" id="addnewLabel">Update User's Info</h5>
        <h5 class="modal-title" v-show="!editmode" id="addnewLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<!-- form for creating users that will appear in the addnew modal -->
      <form  @submit.prevent="editmode ? updateUser(): createUser()">
        <div class="modal-body">
          <div class="form-group">
            <input v-model="form.firstname" type="text" name="firstname" placeholder="First Name" class="form-control" :class="{ 'is-invalid': form.errors.has('firstname') }">
            <has-error :form="form" field="name"></has-error>
          </div>

          <div class="form-group">
            <input v-model="form.lastname" type="text" name="lastname" placeholder="Last Name" class="form-control" :class="{ 'is-invalid': form.errors.has('lastname') }">
            <has-error :form="form" field="lastname"></has-error>
          </div>

          <div class="form-group">
            <input v-model="form.email" type="text" name="email" placeholder="Email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
              <has-error :form="form" field="email"></has-error>
          </div>

          <div class="form-group">
            <input v-model="form.password" type="password" name="password" placeholder="Password" id="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
            <has-error :form="form" field="password"></has-error>
          </div>

          <div class="form-group">
            <select v-model="form.type" type="text" name="type" placeholder="User type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
              <option value="">Select User Role</option>
              <option value="admin">admin</option>
              <option value="user">standard user</option>
              <option value="author">author</option>
            </select>
            <has-error :form="form" field="type"></has-error>
          </div>

          <div class="form-group">
            <textarea v-model="form.bio" type="text" name="bio" placeholder="Biography (optional)" class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
            <has-error :form="form" field="bio"></has-error>
          </div>

          <div class="form-group">
            <input v-model="form.photo" type="text" name="photo" placeholder="Photograph" class="form-control" :class="{ 'is-invalid': form.errors.has('photo') }">
            <has-error :form="form" field="photo"></has-error>
          </div>

          <div class="form-group">
            <input v-model="form.organisation" type="text" name="organisation" placeholder="Organisation" class="form-control" :class="{ 'is-invalid': form.errors.has('organisation') }">
            <has-error :form="form" field="organisation"></has-error>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
        <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
      </div>
      </form>
    </div>
  </div>
</div>

    </div>
</template>

<script>

    export default {
      data() {
        return{
          editmode : false,
          users : {},
          form: new Form({
            // parsing the data retrieved into the relevant fields
            id : '',
            name : '',
            email: '',
            password: '',
            type: '',
            bio: '',
            photo: '' 
          })
        } 
      },
      methods: {
        getResults(page = 1) {
          axios.get('api/user?page=' + page)
          .then(response =>{
            this.users =response.data;
          })
        },
        updateUser(){
          
        // console.log('editing data');
         this.$Progress.start();
        this.form.put('api/user/'+this.form.id)
        .then(()=>{
          // success
        Refresh.$emit('actionMade'); 
        $('#addnew').modal('hide')

         Toast.fire({
                  icon: 'success',
                  title: 'User updated successfully'
                });

         this.$Progress.finish();
        })
        .catch(()=>{
         this.$Progress.fail();
         
        });
        },


        editUser(user){
          this.editmode = true;
          this.form.reset();
          $('#addnew').modal('show')  
          this.form.fill(user);
        },
        
        newModal(){
            this.editmode = false;
            this.form.reset();
            $('#addnew').modal('show')
            
        },

        deleteUser(id){

          const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })

              swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                reverseButtons: false
              }).then((result) => {

                // send request to the server 
                if (result.value) {
                this.form.delete('api/user/'+id);              
                  swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                  Refresh.$emit('actionMade');
                } else if (
                  /* Read more about handling dismissals below */
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                Toast.fire({
                  icon: 'error',
                  title: 'deletion aborted'
                });
                }
})


        },


        loadUsers(){
          if(this.$gate.isAdmin()){

            // using axios to use the api controller to route the data and update the database with the same data
                axios.get("api/user")
                    .then(({ data }) => (this.users = data)) 
                .catch(()=>{
                    this.$Progress.fail(); 
            })
          }
        },

        // method to create user via info given in form
        createUser(){

        // progress bar begins
        this.$Progress.start();

        //  posts http request to server with promise to validate and catch password exception 
        this.form.post('api/user')
        .then(()=>{

                // event initialization 
                Refresh.$emit('actionMade'); 
                // hides the modal once the user is created
                // the addnew is the modal id 
                $('#addnew').modal('hide')

                // splashes the sweet alert feature showing that the user has been successfully created
                Toast.fire({
                  icon: 'success',
                  title: 'User added successfully'
                });

                // progress bar ends 
                this.$Progress.finish();    
                
                
                })
        .catch(()=>{
this.$Progress.fail(); 
        });


        }
      },
        created() {
          Fire.$on('searching',() =>{
            let query = this.$parent.search;
            axios.get('api/findUser?q=' + query)
            .then((data) => {
              this.users = data.data
            })
            .catch(() => {

            })
          })
            this.loadUsers();

            // Event component listening in to refresh
                Refresh.$on('actionMade', () => {
                  this.loadUsers();
                });

            // refreshes the page and sends a request every 3 seconds
            // setInterval(() => this.loadUsers(),3000);
        }
    }
</script>
