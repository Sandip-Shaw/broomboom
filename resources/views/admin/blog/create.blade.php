@extends('admin.adminmain')
 @section('title',"Blog")
 @section('stylesheets')

 @endsection

 @section('content')
<section id="content">
<section class="vbox">
<section class="scrollable padder">

 			<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href=""><i class="fa fa-home"></i>Home</a></li>>
                <li><a href="">Blog management</a></li>>
                <li><a href="">Add Image</a></li>
            </ul>

                       <header class="panel-heading">
                        <span class="h4">Add Image</span>
                      </header>

                      {{Form::open(['route' => 'blog.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      <div class="panel-body">                   
                         <div class="form-group">
                          <label class="col-sm-3 control-label">Image Title</label>
                          <div class="col-sm-9">
                            <input type="text" name="title" class="form-control"  data-required="true" placeholder="Title" required>   
                          </div>
                        </div>
                         <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Description</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" name="description" class="form-control"  data-required="true" placeholder="Description" required> -->  
                            <textarea id="summernote" name="description" class="form-control"></textarea> 
                          </div>
                        </div>
                        <div class="panel-body">                   
                         <div class="form-group">
                          <label class="col-sm-3 control-label">Author</label>
                          <div class="col-sm-9">
                            <input type="text" name="author" class="form-control"  data-required="true" placeholder="Admin" required>   
                          </div>
                        </div> 
                    
                    
                      

                       <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Select An Image(Min Dimension:800x600)</label>
                          <div class="col-sm-9">

                              <div class="input_fields_wrap">
                                  
                                  
                                    <div style="margin-bottom:10px;">
                                         <input type="file" name="image_name" class="GalleryImage" id="img0" required /> &nbsp 
                                    </div>

                             </div>      
                       </div>
                     </div>
                  <footer class="panel-footer text-right bg-light lter">
                       
                          <input type="submit" class="btn btn-success btn-s-xs" value="Submit"/>

                        <!-- <a href="{{url('/admin/course-management')}}" class="btn btn-danger">Cancel</a> -->
                      </footer>


                     </div>

                     {{Form::close()}}
                      
                      
          

</section>
</section>
</section>



 @endsection


 @section('scripts')

 @endsection
