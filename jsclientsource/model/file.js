mhap.file = function(data){
	this.id = data.id;
	this.title = data.title;
	this.description = data.description;
	this.date_created = data.date_created;
	this.downloaded = data.downloaded;
	this.voteup = data.voteup;
	this.votedown = data.votedown;
	this.uploader = new mhap.user( data.uploader );
}