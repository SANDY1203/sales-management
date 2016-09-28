function feedback(userid,contactid,number) {
    // get values
	
    var user_id = userid;
    var ans_1 = $("#feedback1").val();
    var ans_2 = $("#feedback2").val();
	var ans_3 = $("#feedback3").val();
	var ans_4 = $("#feedback4").val();
	var ans_5 = $("#feedback5").val();
	var remarks = $("#remarks").val();
	var contact_id = contactid;

    // Add record
    $.post("ajax/addRecordFeedback.php", {
		
        user_id: user_id,
        ans_1: ans_1,
        ans_2: ans_2,
        ans_3: ans_3,
        ans_4: ans_4,
		ans_5: ans_5,
        remarks: remarks,
		contact_id: contact_id
    }, function (data, status) {
        // close the popup
        $("#give_feedback").modal("hide");

        // read records again
        

        // clear fields from the popup
        //$("#id22").val("");
        //$("#user_id2").val("");
        $("#feedback1").val("");
        $("#feedback2").val("");
        $("#feedback3").val("");
        $("#feedback4").val("");
		$("#feedback5").val("");
        $("#remarks").val("");
		//$("#contact_id").val("");
    });
}



//PROJECT section
function addRecordProject() {
    // get values
	var id = $("#id23").val();
    var project_name = $("#project_name").val();
    var project_desc = $("#project_desc").val();
    var project_company_id = $("#project_company_id").val();
	var project_price = $("#project_price").val();
	var project_team = $("#project_team").val();
	var project_status = $("#project_status").val();
	var user_id = $("#user_id3").val();
	

    // Add record
    $.post("ajax/addRecordProject.php", {
		id: id,
        project_name: project_name,
        project_desc: project_desc,
        project_company_id: project_company_id,
        project_price: project_price,
        project_team: project_team,
		project_status: project_status,
        user_id: user_id
		
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal5").modal("hide");

        // read records again
        readRecordsProject();

        // clear fields from the popup
        $("#id23").val("");
        $("#project_name").val("");
        $("#project_desc").val("");
        $("#project_company_id").val("");
        $("#project_price").val("");
        $("#project_team").val("");
		$("#project_status").val("");
     	$("#user_id3").val("");
    });
}

// READ records
function readRecordsProject() {
    $.get("ajax/readRecordsProject.php", {}, function (data, status) {
        $(".records_content5").html(data);
    });
}




function DeleteProject(id) {
    var conf = confirm("Are you sure, do you really want to delete Project?");
    if (conf == true) {
        $.post("ajax/deleteProject.php", {
                id: id
            },
            function (data, status) {
                // reload Contact by using readRecords();
                readRecordsProject();
            }
        );
    }
}

function DeleteProject1() {
    var conf = confirm("Are you sure, do you really want to delete Project?");
    if (conf == true) {
		var id = $("#hidden_delete_project_id").val();
		
        $.post("ajax/deleteProject.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
				$("#view_project_modal").modal("hide");
                readRecordsProject();
            }
        );
    }
}



function GetProjectDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_project_id").val(id);
    $.post("ajax/readProjectDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_project_name").val(user.project_name);
            $("#update_project_desc").val(user.project_desc);
            $("#update_project_company_id").val(user.project_company_id);
            $("#update_project_price").val(user.project_price);
            $("#update_project_team").val(user.project_team);
			$("#update_project_status").val(user.project_status);
            $("#update_user_id2").val(user.user_id);
        }
    );
    // Open modal popup
    $("#update_project_modal").modal("show");
}

function ViewProject(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_delete_project_id").val(id);
    $.post("ajax/readProjectDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields

            $("#view_id23").val(user.id);
            $("#view_project_name").val(user.project_name);
            $("#view_project_desc").val(user.project_desc);
            $("#view_project_company_id").val(user.company_name);
            $("#view_project_price").val(user.project_price);
            $("#view_project_team").val(user.team_name);
            $("#view_project_status").val(user.project_status);
            $("#view_user_id2").val(user.first_name);
  
        }
    );
    // Open modal popup
    $("#view_project_modal").modal("show");
}

function UpdateProjectDetails() {
    // get values
    var project_name = $("#update_project_name").val();
    var project_desc = $("#update_project_desc").val();
    var project_company_id = $("#update_project_company_id").val();
    var project_price = $("#update_project_price").val();
	var project_team = $("#update_project_team").val();
    var project_status = $("#update_project_status").val();
    var user_id = $("#update_user_id2").val();


    // get hidden field value
    var id = $("#hidden_project_id").val();

    // Update the details by requesting to the server using ajax
    $.post("ajax/updateProjectDetails.php", {
           id: id,
        project_name: project_name,
        project_desc: project_desc,
        project_company_id: project_company_id,
        project_price: project_price,
        project_team: project_team,
		project_status: project_status,
        user_id: user_id,
        },
        function (data, status) {
            // hide modal popup
            $("#update_project_modal").modal("hide");
            // reload contact by using readRecords();
            readRecordsProject();
        }
    );
}

$(document).ready(function () {
    // READ recods on page load
    readRecordsProject(); // calling function
});











