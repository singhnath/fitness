function add_section(obj){
    var attr_blocksLenght=jQuery('.dynamic_section .dynamic_section_block').length;
    var newLenght=parseInt(attr_blocksLenght)+1;
    if(attr_blocksLenght>0){
    	var parentID=jQuery(obj).parents('.dynamic_section_block').attr('id');
    }
    var html='<div class="dynamic_section_block" id="dynamic_section_block-'+newLenght+'">';
    html+='<div class="control-group"><label class="control-label">Section Name :</label><div class="controls">';
	html+='<input type="text" name="section_name[]" placeholder="Name" class="span11" required></div></div>';
	html+='<div class="control-group"><label class="control-label">Description field:</label>';
	html+='<div class="controls"><textarea rows="5" cols="60" name="section_description[]" id="textarea_editor'+newLenght+'" class="textarea_editor span12" style="width:87%"></textarea>';
	html+='<span class="help-block">Description field</span> </div></div>';
	html+='<a href="javascript:void(0)" onclick="add_section(this)" class="add_attr_button">Add Section</a>';
    html+=' <a href="javascript:void(0)" onclick="remove_section(this)" class="remove_attr_button">Remove Section</a>';
	html+='</div><script>$("#textarea_editor'+newLenght+'").wysihtml5();</script>';
	if(attr_blocksLenght<5){
		if(attr_blocksLenght>0){
			jQuery('.dynamic_section #'+parentID+' .add_attr_button').remove();
		    jQuery('.dynamic_section #'+parentID+' .remove_attr_button').remove();
		    jQuery('#'+parentID).after(html);
		}else{
			jQuery('.add_attr_button').remove();
			jQuery(obj).remove();
			jQuery('.dynamic_section').append(html);
		}
	}else{
		alert('You can create maximum 5 section');
	}
}
function remove_section(obj){
	var parentID=jQuery(obj).parents('.dynamic_section_block').attr('id');
    var countAnsBlock=parentID.split('-');
    var newParent=countAnsBlock[1]-1;
    var html='';
    html+='<a href="javascript:void(0)" onclick="add_section(this)" class="add_attr_button">Add More</a>';
    if(newParent > 0)
    {
        html+='<a href="javascript:void(0)" onclick="remove_section(this)" class="remove_attr_button">Remove</a>';
    }else;
    jQuery('.dynamic_section #'+parentID).remove();
    if(newParent == 0)
    {
    	jQuery('.dynamic_section ').append(html);
    }
    else{
    	jQuery('.dynamic_section #dynamic_section_block-'+newParent).append(html);
	}
}

function change_price_type(obj){
    var id=jQuery(obj).attr('id');
    jQuery('#onwardPrice-change').hide();
    jQuery('#onInspection-change').hide();
    jQuery('#onwardPriceVar-change').hide();
    jQuery('#onInspectionVar-change').hide();
    jQuery('.general_price_button .btn-secondary').removeClass('active-price');
    jQuery('#'+id).addClass('active-price');
    jQuery('#'+id+'-change').show();
}

function change_price_type_var(obj){
    var id=jQuery(obj).attr('id');
    var ParentId=jQuery(obj).parent('.general_price_button').parent('.variation_block').attr('id');
    var countQuestion=ParentId.split('-');
    jQuery('input#onInspectionVar-'+countQuestion[1]).val(id);
    jQuery('#'+ParentId+' #onwardPrice-change').hide();
    jQuery('#'+ParentId+' #onInspection-change').hide();
    jQuery('#'+ParentId+' #onwardPriceVar-change').hide();
    jQuery('#'+ParentId+' #onInspectionVar-change').hide();
    jQuery('#'+ParentId+' .general_price_button .btn-secondary').removeClass('active-price');
    jQuery('#'+ParentId+' #'+id).addClass('active-price');
    jQuery('#'+ParentId+' #'+id+'-change').show();
}

function add_procedure(obj){
     var parentID=jQuery(obj).parents('.proc_class').attr('id');
    var attr_blocksLenght=jQuery('.procedure_block .proc_class').length;
    var newLenght=parseInt(attr_blocksLenght)+1;
    var html='<div class="form-group proc_class" id="procedure_block-'+newLenght+'"><input type="text" name="procedure[]" class="form-control" required>';
    html+='<a href="javascript:void(0)" onclick="add_procedure(this)" class="add_attr_button">Add More</a>';
    html+=' <a href="javascript:void(0)" onclick="remove_proc(this)" class="remove_attr_button">Remove</a></div>';
    jQuery('.procedure_block #'+parentID+' .add_attr_button').remove();
    jQuery('.procedure_block #'+parentID+' .remove_attr_button').remove();
    jQuery('#'+parentID).after(html);
}

function add_exclusions(obj){
     var parentID=jQuery(obj).parents('.exclu_class').attr('id');
    var attr_blocksLenght=jQuery('.exclusions_block .exclu_class').length;
    var newLenght=parseInt(attr_blocksLenght)+1;
    var html='<div class="form-group exclu_class" id="exclusions_block-'+newLenght+'"><input type="text" name="exclusions[]" class="form-control" required>';
    html+='<a href="javascript:void(0)" onclick="add_exclusions(this)" class="add_attr_button">Add More</a>';
    html+=' <a href="javascript:void(0)" onclick="remove_exclu(this)" class="remove_attr_button">Remove</a></div>';
    jQuery('.exclusions_block #'+parentID+' .add_attr_button').remove();
    jQuery('.exclusions_block #'+parentID+' .remove_attr_button').remove();
    jQuery('#'+parentID).after(html);
}

function add_inclusions(obj){
     var parentID=jQuery(obj).parents('.inclu_class').attr('id');
    var attr_blocksLenght=jQuery('.inclusions_block .inclu_class').length;
    var newLenght=parseInt(attr_blocksLenght)+1;
    var html='<div class="form-group inclu_class" id="inclusions_block-'+newLenght+'"><input type="text" name="inclusions[]" class="form-control" required>';
    html+='<a href="javascript:void(0)" onclick="add_inclusions(this)" class="add_attr_button">Add More</a>';
    html+=' <a href="javascript:void(0)" onclick="remove_inclu(this)" class="remove_attr_button">Remove</a></div>';
    jQuery('.inclusions_block #'+parentID+' .add_attr_button').remove();
    jQuery('.inclusions_block #'+parentID+' .remove_attr_button').remove();
    jQuery('#'+parentID).after(html);
}

function remove_exclu(obj)
{
          var parentID=jQuery(obj).parents('.exclu_class').attr('id');
          var countAnsBlock=parentID.split('-');
          var newParent=countAnsBlock[1]-1;
          var html='';
            html+='<a href="javascript:void(0)" onclick="add_exclusions(this)" class="add_attr_button">Add More</a>';
          if(newParent > 1)
          {
            html+='<a href="javascript:void(0)" onclick="remove_exclu(this)" class="remove_attr_button">Remove</a>';
          }else;
            jQuery('.exclusions_block #'+parentID).remove();
          jQuery('.exclusions_block #exclusions_block-'+newParent).append(html);
}

function remove_inclu(obj)
{
    var parentID=jQuery(obj).parents('.inclu_class').attr('id');
    var countAnsBlock=parentID.split('-');
    var newParent=countAnsBlock[1]-1;
    var html='';
    html+='<a href="javascript:void(0)" onclick="add_inclusions(this)" class="add_attr_button">Add More</a>';
    if(newParent > 1)
    {
        html+='<a href="javascript:void(0)" onclick="remove_inclu(this)" class="remove_attr_button">Remove</a>';
    }else;
    jQuery('.inclusions_block #'+parentID).remove();
    jQuery('.inclusions_block #inclusions_block-'+newParent).append(html);
}

function remove_proc(obj)
{
    var parentID=jQuery(obj).parents('.proc_class').attr('id');
    var countAnsBlock=parentID.split('-');
    var newParent=countAnsBlock[1]-1;
    var html='';
    html+='<a href="javascript:void(0)" onclick="add_procedure(this)" class="add_attr_button">Add More</a>';
    if(newParent > 1)
    {
        html+='<a href="javascript:void(0)" onclick="remove_proc(this)" class="remove_attr_button">Remove</a>';
    }else;
    jQuery('.procedure_block #'+parentID).remove();
    jQuery('.procedure_block #procedure_block-'+newParent).append(html);
}
