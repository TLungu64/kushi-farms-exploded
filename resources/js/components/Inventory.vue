<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="row mt-5" v-if="$gate.isAdmin()">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Inventory Table</h3>

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
                      <th>Item Type</th>
                      <th>Unit of Measurement</th>
                      <th>Price per Unit</th>
                      <th>Available</th>
                      <th>Created At</th>
                      <th>Modify</th>
                    </tr>

                  </thead>

                  <tbody>

                    <tr v-for="inventory in inventorys.data" :key="inventory.id">
                      <td>{{inventory.id}}</td>
                      <td>{{inventory.name}}</td>
                      <td>{{inventory.itemType}}</td>
                      <td>{{inventory.unitOfMeasure}}</td>
                      <td>{{inventory.pricePerUnit}}</td>
                      <td>{{inventory.available}}</td>
                      <td>{{inventory.created_at | myDate}}</td>
                      <td>
                          <a href="#" @click ="editInventory(inventory)">
                          <i class="fa fa-edit"></i>
                      </a>
                      /
                      <a href="#" @click="deleteInventory(inventory.id)">
                          <i class="fa fa-trash red"></i>
                      </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>  
              <!-- /.card-body -->
              <div class="card-footer">
                <pagination :data="inventorys"
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
        <h5 class="modal-title" v-show="editmode" id="addnewLabel">Update Inventory Info</h5>
        <h5 class="modal-title" v-show="!editmode" id="addnewLabel">Add New Inventory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<!-- form for creating users that will appear in the addnew modal -->
      <form  @submit.prevent="editmode ? updateInventory(): createInventory()">
      <div class="modal-body">
        <div class="form-group">
      <input v-model="form.name" type="text" name="name"
      placeholder="Name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
      <has-error :form="form" field="name"></has-error>
      </div>

    

        <div class="form-group">
      <select v-model="form.itemType" type="text" name="itemType"
      placeholder="Select Item Type"
        class="form-control" :class="{ 'is-invalid': form.errors.has('itemType') }">
        <option value="">Select Item Type</option>
        <option value="Livestock">Livestock</option>
        <option value="Cashcrop"> Cashcrop</option>
        <option value="Fisheries">Fisheries</option>
      </select>
      <has-error :form="form" field="itemType"></has-error>
      </div>
    
        <div class="form-group">
      <select v-model="form.unitOfMeasure" type="text" name="unitOfMeasure"
      placeholder="Select Unit"
        class="form-control" :class="{ 'is-invalid': form.errors.has('unitOfMeasure') }">
        <option value="">Select Unit of Measurement</option>
        <option value="KG">KG</option>
        <option value="L"> L</option>
        <option value="ton">ton</option>
      </select>
      <has-error :form="form" field="unitOfMeasure"></has-error>
      </div>


        <div class="form-group">
      <input v-model="form.pricePerUnit" type="text" name="pricePerUnit"
      placeholder="pricePerUnit"
        class="form-control" :class="{ 'is-invalid': form.errors.has('pricePerUnit') }">
      <has-error :form="form" field="photo"></has-error>
    </div>

        <div class="form-group">
      <input v-model="form.photo" type="text" name="photo"
      placeholder="photo"
        class="form-control" :class="{ 'is-invalid': form.errors.has('photo') }">
      <has-error :form="form" field="photo"></has-error>
    </div>
    
        <div class="form-group">
      <input v-model="form.available" type="text" name="available"
      placeholder="available"
        class="form-control" :class="{ 'is-invalid': form.errors.has('available') }">
      <has-error :form="form" field="available"></has-error>
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
          inventorys : {},
          form: new Form({
            // parsing the data retrieved into the relevant fields
            id : '',
            name : '',
            itemType: '',
            unitOfMeasure: '',
            pricePerUnit: '',
            available: '',
            photo: '' 
          })
        } 
      },
      methods: {
        getResults(page = 1) {
          axios.get('api/inventory?page=' + page)
          .then(response =>{
            this.inventorys =response.data;
          })
        },
        updateInventory(){
// console.log('editing data');
         this.$Progress.start();
        this.form.put('api/inventory/'+this.form.id)
        .then(()=>{
          // success
        Refresh.$emit('actionMade'); 
        $('#addnew').modal('hide')

         Toast.fire({
                  icon: 'success',
                  title: 'inventory updated successfully'
                });

         this.$Progress.finish();
        })
        .catch(()=>{
         this.$Progress.fail();
         
        });
        },


        editInventory(inventory){
          this.editmode = true;
          this.form.reset();
          $('#addnew').modal('show')  
          this.form.fill(inventory);
        },
        
        newModal(){
            this.editmode = false;
            this.form.reset();
            $('#addnew').modal('show')
            
        },

        deleteInventory(id){

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
                this.form.delete('api/inventory/'+id);              
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

            // using axios to use the api controller to route the data and update the database with the same data
             loadInventorys(){
                if(this.$gate.isAdmin()){
                    axios.get("api/inventory").then(({ data }) => (this.inventorys = data));
                }
            },

        // method to create inventory via info given in form
        createInventory(){

        // progress bar begins
        this.$Progress.start();

        //  posts http request to server with promise to validate and catch password exception 
        this.form.post('api/inventory')
        .then(()=>{

                // event initialization 
                Refresh.$emit('actionMade'); 
                // hides the modal once the user is created
                // the addnew is the modal id 
                $('#addnew').modal('hide')

                // splashes the sweet alert feature showing that the user has been successfully created
                Toast.fire({
                  icon: 'success',
                  title: 'Signed in successfully'
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
            axios.get('api/findInventory?q=' + query)
            .then((data) => {
              this.inventorys = data.data
            })
            .catch(() => {

            })
          })
            this.loadInventorys();

            // Event component listening in to refresh
                Refresh.$on('actionMade', () => {
                  this.loadInventorys();
                });

            // refreshes the page and sends a request every 3 seconds
            // setInterval(() => this.loadUsers(),3000);
        }
    }
</script>
