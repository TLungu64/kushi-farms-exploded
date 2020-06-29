<template>
    <div class="container">

        <div class="row ">
            <div class="col-md-12" v-if="$gate.isAdmin()">
               <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white" style="background: url('./images/desk.jpg') center center;">
                <h3 class="widget-user-username text-left">Elizabeth Pierce</h3>
                <h5 class="widget-user-desc text-left">Web Designer</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" :src="getProfilePhoto()" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>

            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                  
                  </div>
                  

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-12 col-form-label">Name</label>
                        <div class="col-sm-12">
                          <input type="text" v-model="form.name" class="form-control" id="inputName" placeholder="Name">
                          <has-error :form="form" field="name" :class="{ 'is-invalid': form.errors.has('name') }"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail"  class="col-sm-12 col-form-label">Email</label>
                        <div class="col-sm-12">
                          <input type="email" v-model="form.email" class="form-control" id="inputEmail" placeholder="Email" :class="{ 'is-invalid': form.errors.has('email') }">
                          <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-12 col-form-label">Experience</label>
                        <div class="col-sm-12">
                          <textarea class="form-control" v-model="form.bio" id="inputExperience" placeholder="Experience" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                          <has-error :form="form" field="bio"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="profilePhoto" class="col-sm-12 col-form-label">Profile Photo</label>
                        <div class="col-sm-12">
                          <input type="file" @change="updateProfile " name="profilePhoto" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-12 col-form-label">Password (leave empty if not changing)</label>
                        <div class="col-sm-12">
                          <input type="text" v-model="form.password" class="form-control" id="inputSkills" placeholder="Password" :class="{ 'is-invalid': form.errors.has('password') }" >
                          <has-error :form="form" field="password"></has-error>
                      </div>
                      </div>
                      <div class="form-group row">
                        <div class=" col-sm-10">
                          <button @click.prevent="updateInfo " type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
              </div>
            </div>
        </div>
</template>

<script>
import Form from 'vform'
    export default {
  
        data(){
          return {
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
        mounted() {
            console.log('Component mounted.')
        },
  
        methods:{
          
          getProfilePhoto(){
            return this.form.photo;
           
          },
          updateInfo(){
            this.$Progress.start();
          if(this.form.password == ""){
            this.form.password = undefined; 
      
          }
              this.form.put('api/profile')
              .then(()=>{

                 
                this.$Progress.finish();
              })
              .catch(()=>{


                this.$Progress.fail();
              });
          },
          updateProfile(e){
              if(this.form.password == ""){
            this.form.password = undefined;
      
          }
            let file= e.target.files[0];
             console.log(file);
            let reader = new FileReader();

            if(file['size'] < 2111775){
              // this.$Progress.start();
              reader.onloadend = (file) => {
                this.form.photo = reader.result;
                // console.log('RESULT',reader.result)
              }
              // this.$Progress.finish();
              reader.readAsDataURL(file);
              
              }else{
                // this.$Progress.fail();
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'file too large!',
              })
              }
              }
        },
        created() {
          this.getProfilePhoto();

          axios.get("api/profile")
          .then(({ data }) => (this.form.fill(data)));

        
        }
    }
</script>
