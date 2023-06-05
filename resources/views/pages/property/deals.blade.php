<div class="main-panel">
        <div class="content-wrapper">
          <!-- row end -->
               <div class="row">
                  <div class="row g-3 mb-4">
                     <div class="col-auto">
                        <h2 class="mb-0">Property Deals Settings</h2>
                     </div>
                  </div>
                  @include('pages.property._menu')
                  <div class="col-md-9">
                     @include('partials._messages')
                     <div class="row mb-3">
                        <form action="{!! route('property.deals.settings.update',$propertyCode) !!}" method="POST">
                           @csrf
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="">Deals Marketing Statement</label>
                                 <textarea name="deal_marketing_statement" class="form-control" cols="30" rows="10" required>{!! $property->deal_marketing_statement !!}</textarea>
                              </div>
                           </div>
                           <center><button class="btn btn-primary mt-3" type="submit">Update Information</button></center>
                        </form>
                     </div>
                  </div>
        </div>
        <!-- content-wrapper ends -->


