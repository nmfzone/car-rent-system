$(function() {
  var deleter = {
    elementSelector       : ".the-tables",
    classSelector         : ".delete-this",
    laravelToken          : null,
    url                   : "/",

    init: function() {
      $(this.elementSelector).on('click', this.classSelector, {self:this}, this.handleClick);
    },

    handleClick: function(event) {
      event.preventDefault();

      var self = event.data.self;
      var link = $(this);

      self.url = link.attr('href');
      self.laravelToken = $("meta[name=csrf-token]").attr('content');

      self.confirmDelete();
    },

    confirmDelete: function() {
      if (confirm('Apakah anda yakin?')) {
        this.makeDeleteRequest()
      }
    },

    makeDeleteRequest: function() {
      var form =
        $('<form>', {
          'method': 'POST',
          'action': this.url
        });

      var token =
        $('<input>', {
          'type': 'hidden',
          'name': '_token',
          'value': this.laravelToken
        });

      var hiddenInput =
        $('<input>', {
          'name': '_method',
          'type': 'hidden',
          'value': 'DELETE'
        });

      return form.append(token, hiddenInput).appendTo('body').submit();
    }
  };
  deleter.init();
});
