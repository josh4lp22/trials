// Create a model for the services
var Service = Backbone.Model.extend({
	defaults:{
		title: 'My service',
		price: 100,
		checked: false
	},

	// Helper function for checking/unchecking a service
	toggle: function(){
		this.set('checked', !this.get('checked'));
	}
});