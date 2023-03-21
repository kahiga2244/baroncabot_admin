<div class="col-md-3">
   <!-- Tab navs -->
   <div class="nav flex-column nav-pills">
      <a class="nav-link {{ Nav::isResource('posts') }}" href="{!! route('property.edit',$propertyCode) !!}" role="tab"><i class="fa fa-info-circle"></i> Details</a>
      <a class="nav-link {{ Nav::isResource('units') }}" href="{!! route('property.units',$propertyCode) !!}"><i class="fa fa-check-circle"></i> Unit</a>
      <a class="nav-link {{ Nav::isResource('files') }}" href="{!! route('property.files',$propertyCode) !!}"><i class="fa fa-folder-open"></i> Media</a>
      <a class="nav-link {{ Nav::isResource('plans') }}" href="{!! route('property.floor.plans',$propertyCode) !!}"><i class="fa fa-folder-open"></i> Floor Plans</a>
      <a class="nav-link {{ Nav::isResource('videos') }}" href="{!! route('property.videos',$propertyCode) !!}"><i class="fa fa-video"></i> Video</a>
      <a class="nav-link {{ Nav::isResource('values') }}" href="{!! route('property.cashflow.values',$propertyCode) !!}"><i class="fas fa-edit"></i> Cash Flow Values</a>
      <a class="nav-link {{ Nav::isResource('cashflow') }}" href="{!! route('property.cashflow',$propertyCode) !!}"><i class="far fa-pound-sign"></i> Cash Flow</a>
      <a class="nav-link {{ Nav::isResource('deal') }}" href="{!! route('property.deals.settings',$propertyCode) !!}"><i class="fas fa-rocket-launch"></i> Deals</a>
   </div>
   <!-- Tab navs -->
</div>
