mhap.residence = function(data){
	this.id = data.id;
	this.name = data.name;
	this.area = data.area;
	this.location = {
		lat : data.location.lat,
		lng : data.location.lng
	}
	this.type = data.type;
	this.totalHouse = data.totalHouse;
	this.available = data.available;
	this.productionDate = data.productionDate;
};