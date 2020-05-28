<template>
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
               <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white" style="background: url('./images/desk.jpg') center center;">
                <h3 class="widget-user-username text-left">Elizabeth Pierce</h3>
                <h5 class="widget-user-desc text-left">Web Designer</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="" alt="User Avatar">
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
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail"  class="col-sm-12 col-form-label">Email</label>
                        <div class="col-sm-12">
                          <input type="email" v-model="form.email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-12 col-form-label">Experience</label>
                        <div class="col-sm-12">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
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
                          <input type="text" class="form-control" id="inputSkills" placeholder="Password">
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
          
          updateInfo(){
              this.form.put('api/profile')
              .then(()=>{

              })
              .catch(()=>{

              });
          },
          updateProfile(e){
            let file= e.target.files[0];
            //  console.log('uploading');
            let reader = new FileReader();
            reader.onloadend = (file) => {
              this.form.photo = reader.result;
              // console.log('RESULT',reader.result)
            }
            reader.readAsDataURL(file);
          }
        },

        created() {
          axios.get("api/profile")
          .then(({ data }) => (this.form.fill(data)));
        }
    }
</script>
