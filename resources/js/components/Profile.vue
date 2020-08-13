<style scoped>
    .widget-user-header{
        background-position: center center;
        background-size: cover;
        height: 250px;
    }
</style>

<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                
                <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white" style="background-image:url('./images/bananas_7.jpeg')">
                        <h3 class="widget-user-username text-right">Elizabeth Pierce</h3>
                        <h5 class="widget-user-desc text-right">Web Designer</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="images/user.png" alt="User Avatar">
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
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                      <h1>Coming soon...</h1>
                  </div>

                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" v-model="form.firstname" class="form-control" id="firstname">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" v-model="form.lastname" class="form-control" id="lastname">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" v-model="form.email" class="form-control" id="email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="bio" class="col-sm-2 col-form-label">Bio</label>
                        <div class="col-sm-10">
                          <textarea v-model="form.bio" class="form-control" id="bio"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-10">
                          <input type="file" id="photo" @change="uploadPic" class="form-input">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="passport" class="col-sm-2 col-form-label">Passport (leave blank if not changing)</label>
                        <div class="col-sm-10">
                          <input type="text" v-model="form.passport" class="form-control" id="passport">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" @click.prevent="updateProfile" class="btn btn-danger">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>

    </div>
</template>

<script>
    export default {
        data(){
            return{
                form: new Form({
                    id : '',
                    firstname : '',
                    lastname : '',
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
            updateProfile(){
                this.form.put('api/profile/')
                .then(()=>{

                })
                .catch(()=>{

                });
            },
            uploadPic(e){
                let file = e.target.files[0];
                let reader = new FileReader();
                reader.onloadend = (file) => {
                  this.form.photo = reader.result;
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
