// Create a collection of services
var ServiceList = Backbone.Collection.extend({

	// Will hold objects of the Service model
	model: Service,

	// Return an array only with the checked services
	getChecked: function(){
		return this.where({checked:true});
	}
});
// Prefill the collection with a number of services.
var services = new ServiceList([
	new Service({ title: 'Basic Servicing', price: 500}),
	new Service({ title: 'Oil Change', price: 250}),
	new Service({ title: 'Labor', price: 100}),
	new Service({ title: 'Head Lamps', price: 70})
]);