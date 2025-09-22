 <div class="tab-pane fade" id="pane-activity" role="tabpanel" aria-labelledby="tab-activity">
     <h5 class="text-maroon font-weight-bold mb-3">
         <i class="fas fa-stream mr-2"></i>Activity
     </h5>
     <ul class="list-group">
         <li class="list-group-item">
             <i class="fas fa-plus-circle mr-2 text-success"></i>
             <strong>Submitted:</strong>
             {{ \Carbon\Carbon::parse($admission->created_at)->format('F d, Y - h:i A') }}
         </li>
         <li class="list-group-item">
             <i class="fas fa-edit mr-2 text-warning"></i>
             <strong>Last Updated:</strong>
             {{ \Carbon\Carbon::parse($admission->updated_at)->format('F d, Y - h:i A') }}
         </li>
     </ul>
 </div>