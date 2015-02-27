var release_collection = Backbone.Collection.extend({
	model: release_model,
    url: "http://localhost:81/trials/backbone/simpleGetData/index.php?action=get"
});