<div>
   <table class="table table-striped">
      <thead>
         <th>#</th>
         <th>Floor</th>
         <th>Unit</th>
         <th>size</th>
         <th>Price per sqf</th>
         <th>Price</th>
         <th>Status</th>
         <th width="18%">Action</th>
      </thead>
      <tbody>
         @foreach($units as $count=>$unit)
            @php
               $unitCodeInfo = json_encode($unit->property_code);
               $countRes = $count+1;
            @endphp
            <tr>
               <td>{!! $countRes !!}</td>
               <td>{!! $unit->floor !!}</td>
               <td>{!! $unit->title !!}</td>
               <td>{!! $unit->size !!} sqft</td>
               <td>£{!! number_format($unit->price_per_sqf) !!}</td>
               <td>£{!! number_format($unit->price) !!}</td>
               <td>
                  @if($unit->sales_status)
                     <span class="badge badge-danger">Sold</span>
                  @else
                     @if($unit->reserved_by)
                        <span class="badge badge-info">Reserved</span>
                     @else
                        <span class="badge badge-success">Available</span>
                     @endif
                  @endif
               </td>
               <td>
                  <a href="#" wire:click="edit({{$unitCodeInfo}})" data-bs-toggle="modal" data-bs-target="#unitModal" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                  <a href="#" wire:click="confirm({{$unitCodeInfo}})" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete"><i class="fas fa-trash-alt"></i></a>
                  @if($unit->sales_status != 'Sold')
                     <a href="#"  data-bs-toggle="modal" data-bs-target="#DealModal{{ $countRes }}" class="btn btn-warning btn-sm"><i class="far fa-star-shooting"></i></a>
                  @endif
                  <a href="{!! route('marketing.unit',$unit->property_code) !!}" class="btn btn-sm btn-info"><i class="fas fa-paper-plane"></i></a>
               </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="DealModal{{ $countRes }}" tabindex="-1" role="dialog" aria-bs-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add unit to deals</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
                     </div>
                     <form action="{!! route('property.deals.units') !!}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                           <label for=""><b>Unit :</b> {!! $unit->title !!}</label>
                           <input type="hidden" name="unit" class="form-control" value="{!! $unit->property_code !!}" required>
                           <input type="hidden" name="project" class="form-control" value="{!! $this->propertyCode !!}" required>
                           <div class="form-group mb-2">
                              {{-- <label for="">Select Projects</label>
                              {!! Form::select('projects',[],null,['class'=>'form-control select2','multiple'=>'']) !!} --}}
                              <label for="organizerMultiple">Select Deals</label>
                              <select class="form-control" multiple name="deals[]" required>
                                 @foreach(Property::deals() as $deal)
                                    <option value="{!! $deal->deal_code !!}">{!! $deal->title !!}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         @endforeach
      </tbody>
   </table>

   <div wire:ignore.self class="modal fade" id="unitModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">Edit Unit</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{!! route('property.unit.individual.add') !!}" method="POST" enctype="multipart/form-bata">
               @csrf
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="">Unit</label>
                           <input type="text" wire:model.defer="unit" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="">Bedroom(s)</label>
                           <input type="text" wire:model.defer="bedrooms" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="">Floor</label>
                           <input type="text" wire:model.defer="floor" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="">Unit size</label>
                           <input type="text" wire:model.defer="size" class="form-control" required>
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="">Bath room(s)</label>
                           <input type="text" wire:model.defer="bathrooms" class="form-control" required>
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="">Unit price</label>
                           <input type="text" wire:model.defer="price" class="form-control" required>
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="">Rent per month</label>
                           <input type="text" wire:model.defer="rent_per_month" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="">Furniture pack</label>
                           <input type="text" wire:model.defer="furniture_pack" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="">Plot</label>
                           <input type="text" wire:model.defer="plot" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <input type="checkbox" wire:model.defer="sales_status" value="Sold" @if($this->sales_status == 'Sold') checked @endif>
                           <label for="">Sold</label>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" wire:click.prevent="update()" class="btn btn-sm btn-success">Update Unit</button>
               </div>
            </form>
         </div>
      </div>
   </div>


   <!-- Modal HTML -->
   <div wire:ignore.self class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-confirm">
         <div class="modal-content">
            <div class="modal-header flex-column">
               <div class="icon-box">
                  <i class="material-icons">&#xE5CD;</i>
               </div>
               <h4 class="modal-title w-100">Are you sure?</h4>
            </div>
            <div class="modal-body">
               <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
               <button type="button" wire:click="close()" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
               <button type="button" wire:click="delete()" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
            </div>
         </div>
      </div>
   </div>

</div>
