<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="row mt-5" v-if="$gate.isAdmin()">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Stock Table</h3>

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
                      <th>Inventory ID</th>
                      <th>Date To Maturity</th>
                      <th>Status</th>
                      <th>Price</th>
                      <th>Unit</th>
                      <th>Created At</th>
                      <th>Modify</th>
                    </tr>

                  </thead>

                  <tbody>

                    <tr v-for="stock in stocks.data" :key="stock.id">
                      <td>{{stock.id}}</td>
                      <td>{{stock.inventory_id}}</td>
                      <td>{{stock.type}}</td>
                      <td>{{stock.status}}</td>
                      <td>{{stock.price}}</td>
                      <td>{{stock.unit}}</td>
                      <td>{{stock.dateToMaturity}}</td>
                      <td>{{stock.created_at | myDate}}</td>
                      <td>
                          <a href="#" @click ="editStock(stock)">
                          <i class="fa fa-edit"></i>
                      </a>
                      /
                      <a href="#" @click="deleteStock(stock.id)">
                          <i class="fa fa-trash red"></i>
                      </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>  
              <!-- /.card-body -->
              <div class="card-footer">
                <pagination :data="stocks"
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
        <h5 class="modal-title" v-show="editmode" id="addnewLabel">Update Stock Info</h5>
        <h5 class="modal-title" v-show="!editmode" id="addnewLabel">Add New Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<!-- form for creating users that will appear in the addnew modal -->
      <form  @submit.prevent="editmode ? updateStock(): createStock()">
      <div class="modal-body">
        <!-- <div class="form-group">
      <input v-model="form.inventory_id" type="text" name="inventory_id"
      placeholder="inventory_id"
        class="form-control" :class="{ 'is-invalid': form.errors.has('inventory_id') }">
      <has-error :form="form" field="inventory_id"></has-error>
      </div> -->

    

        <div  class="form-group">
      <select v-model="form.type" type="text" name="type"
      placeholder="Select Type"
        class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
        <option value="">Select type</option>
        <option value=""></option>
      </select>
      <has-error :form="form" field="type"></has-error>
      </div>


        <div class="form-group">
      <input v-model="form.dateToMaturity" type="date" name="dateToMaturity"
      placeholder="dateToMaturity"
        class="form-control" :class="{ 'is-invalid': form.errors.has('dateToMaturity') }">
      <has-error :form="form" field="photo"></has-error>
    </div>

        <div class="form-group">
      <input v-model="form.price" type="text" name="price"
      placeholder="price"
        class="form-control" :class="{ 'is-invalid': form.errors.has('price') }">
      <has-error :form="form" field="photo"></has-error>
    </div>

        <div class="form-group">
      <input v-model="form.unit" type="text" name="unit"
      placeholder="unit"
        class="form-control" :class="{ 'is-invalid': form.errors.has('unit') }">
      <has-error :form="form" field="unit"></has-error>
    </div>
    
    
        <div class="form-group">
      <select v-model="form.status" type="text" name="status"
      placeholder="Select Item Type"
        class="form-control" :class="{ 'is-invalid': form.errors.has('status') }">
        <option value="">Select status</option>
        <option value="AVBL">Available</option>
        <option value="DEAD"> Dead</option>
        <option value="STOL">Stolen</option>
        <option value="SICK">Sick</option>
        <option value="RESV">Reserved</option>
        <option value="SOLD">sold</option>
        <option value="INAC">inactive</option>
      </select>
      <has-error :form="form" field="status"></has-error>
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
          stocks : {},
          form: new Form({
            // parsing the data retrieved into the relevant fields
            id : '',
            inventory_id : '',
            dateToMaturity: '',
            type : '',
            status: '',
            price: '',
            unit: ''
            
          }
          )

        } 
      },
      // data() {
      //   return{
      //     editmode : false,
      //     inventorys : {},
      //     form: new Form({
      //       // parsing the data retrieved into the relevant fields
      //       id : '',
      //       name : '',
          
            
      //     })
      //   }
      // },
      methods: {
        getResults(page = 1) {
          axios.get('api/stock?page=' + page)
          .then(response =>{
            this.stocks =response.data;
          })
        },
        updateStock(){
// console.log('editing data');
         this.$Progress.start();
        this.form.put('api/stock/'+this.form.id)
        .then(()=>{
          // success
        Refresh.$emit('actionMade'); 
        $('#addnew').modal('hide')

         Toast.fire({
                  icon: 'success',
                  title: 'stock updated successfully'
                });

         this.$Progress.finish();
        })
        .catch(()=>{
         this.$Progress.fail();
         
        });
        },

        // loadInventory(){
        //   if(this.$gate.isAdmin()){
        //             axios.get("api/inventory").then(({ dat }) => (this.inventorys = dat));
        //         }
        // },

        editStock(stock){
          this.editmode = true;
          this.form.reset();
          $('#addnew').modal('show')  
          this.form.fill(stock);
        },
        
        newModal(){
            this.editmode = false;
            this.form.reset();
            $('#addnew').modal('show')
            
        },

        deleteStock(id){

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
                this.form.delete('api/stock/'+id);              
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
             loadStocks(){
                if(this.$gate.isAdmin()){
                    axios.get("api/stock").then(({ data }) => (this.stocks = data));
                }
            },

        // method to create stock via info given in form
        createStock(){

        // progress bar begins
        this.$Progress.start();

        //  posts http request to server with promise to validate and catch password exception 
        this.form.post('api/stock')
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
            axios.get('api/findStock?q=' + query)
            .then((data) => {
              this.stocks = data.data
            })
            .catch(() => {

            })
          })
            this.loadStocks();

            // Event component listening in to refresh
                Refresh.$on('actionMade', () => {
                  this.loadStocks();
                });

            // refreshes the page and sends a request every 3 seconds
            // setInterval(() => this.loadUsers(),3000);
        }
    }
</script>
