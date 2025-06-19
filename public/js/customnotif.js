function notify(from, align, icon, type, animIn, animOut , title , message ,bg ){
    $.notify({
        icon: icon,
        title: title,
        message: message,
        url: ''
    },{
        element: 'body',
        type: type,
        allow_dismiss: true,
        placement: {
            from: from,
            align: align
        },
        offset: {
                        x: 15, // Keep this as default
                        y: 80  // Unless there'll be alignment issues as this value is targeted in CSS
                    },
                    spacing: 10,
                    z_index: 10031,
                    delay: 1500,
                    timer: 1000,
                    url_target: '_blank',
                    mouse_over: false,
                    animate: {
                        enter: animIn,
                        exit: animOut
                    },
                    template:
                    '<div class="'+bg+'" style="max-width:300px;padding:10px;border-radius:10px;">' +
                    '<div class="row">'+
                    '<div class="col-md-2 text-white text-center" >'+
                    '<i class="zmdi '+icon+' zmdi-hc-lg "></i>'+
                    '</div>'+
                    '<div class="col-md-8">'+
                    '<span data-notify="title" class="text-center text-white">{1}</span> ' +
                    '<span data-notify="message" class="text-center text-white">{2}</span>' +
                    '</div>'+
                    '<div class="col-md-2"></div>'+

                    // '<div class="progress" data-notify="progressbar">' +
                    // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    // '</div>' +
                    // '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    // '<button type="button" aria-hidden="true" data-notify="dismiss" class="alert--notify__close text-white"><i class="zmdi zmdi-check-all"></i></button>' +
                    '</div>'
                });
}