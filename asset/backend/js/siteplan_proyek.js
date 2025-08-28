jQuery(document).ready(function ($) {
    var width = $('.information-siteplan').width();
    if (width == undefined) {
        width = $('.card > .card-body').width();
    }
    var height = 550;

    var stage = new Konva.Stage({
        container: '#konva-sites',
        width: width,
        height: height,
    });
    var layerBackground = new Konva.Layer({
        draggable: true,
    });
    stage.add(layerBackground);

    var groupImage = new Konva.Group();
    var groupPoly = new Konva.Group();
    var groupBubble = new Konva.Group({
        visible: false,
    });
    // add the layer to the stage

    layerBackground.add(groupImage);
    layerBackground.add(groupPoly);

    Konva.Image.fromURL(konva_image, function (darthNode) {
        darthNode.setAttrs({
            x: 0,
            y: 0,
            // scaleX: 0.5,
            // scaleY: 0.5,
        });
        let w = darthNode.width()

        layerBackground.scaleX(width / w)
        layerBackground.scaleY(width / w)
        groupImage.add(darthNode);

        // groupImage.add(groupBubble)
    });
    var bubble = null;
    Konva.Image.fromURL(konva_bubble, function (darthNode) {
        darthNode.setAttrs({
            x: 0,
            y: 0,
            id: 'bubble',
            scaleX: 0.5,
            scaleY: 0.5,
        });
        bubble = darthNode
        groupBubble.add(darthNode);
    });

    // disable temporer
    let siteplan_detail = JSON.parse(konva_siteplan)
    console.log(siteplan_detail, 'siteplan_detail')

    siteplan_detail.forEach(element => {
        if (element?.points != '') {
            createPoly(element)
        }
    });

    function getRandomHexColor() {
        const colorsTypes = ['#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#FFA500', '#800080', '#FFC0CB', '#008080', '#808080', '#F0E68C', '#FFF44F'];
        return colorsTypes[Math.floor(Math.random() * colorsTypes.length)];
    }

    function createPoly(element) {
        let points = JSON.parse(element.points);
        // console.log(element);
        // let color_fill = element.color_code ?? getRandomHexColor();
        let color_fill = element.color_code ?? '#808080';
        console.log(color_fill, 'Custom color based on status');

        let n_status_user;

        let poly = new Konva.Line({
            points: points.flat(),
            fill: color_fill,
            stroke: 'black',
            strokeWidth: 1,
            closed: true,
            opacity: 0.7,
        });

        // kasih huruf R
        const box = poly.getClientRect();
        const x = box.x + box.width / 2;
        const y = box.y + box.height / 2;
        let simpleText = new Konva.Text({
            text: 'R',
            fontSize: 20,
            fontFamily: 'Calibri',
            // fill: 'green',
        });
        let groupText = new Konva.Group();
        let imageObj = new Image();
        imageObj.onload = function () {
            const polyRect = poly.getClientRect();
            rasio = polyRect.width / polyRect.height
            const text2 = simpleText.getSelfRect();
            // console.log(text2.width)

            const text = groupText.getClientRect({
                relativeTo: layerBackground
            });
            const ax = x - text.width / 2;
            const ay = y - text.height / 2;
            // console.log(text)
            groupText.position({
                x: ax,
                y: ay,
            })
        };
        imageObj.src = konva_image_home;
        if (n_status_user == 2) {
            groupText.add(simpleText);
        }

        const text = groupText.getClientRect();
        const ax = x - text.width / 2;
        const ay = y - text.height / 2;

        groupText.absolutePosition({
            x: ax,
            y: ay,
        })
        groupText.zIndex(10)
        poly.zIndex(5)
        groupPoly.add(groupText);
        groupPoly.add(poly);


        poly.on('click tap', function (evt) {
            if (konva_view) {
                console.log(element, element?.cluster_id)

                $.ajax({
                    url: url_blok_info,
                    type: 'POST',
                    data: {
                        id: element?.cluster_id,
                    },
                    success: function (res) {
                        // process data
                        console.log(res, 'res');
                        // end show modal
                    }
                });
                return false;
            }
            if (evt.evt.altKey && konva_set_points) {
                if (confirm("Yakin akan di delete")) {
                    $.ajax({
                        type: "POST",
                        // url: url_blok_delete + element?.id,
                        url: url_blok_delete,
                        data: {
                            id: element?.id,
                        },
                    }).done(function (msg) {
                        poly.destroy()
                        let title = stage.findOne('#title')
                        title.destroy();
                        showToast('Success', 'Data Cluster berhasil di hapus')
                        groupBubble.hide()
                        setTimeout(() => {
                            window.location.reload()
                        }, 300);

                        // let subtitle = stage.findOne('#subtitle')
                        // subtitle.destroy();
                    })
                }
            }
        })
        poly.on('mouseenter', function (evt) {
            // console.log('enter',element.blok_id)
            // console.log(element);
            let nama_blok = new Konva.Text({
                text: element?.cluster_name,
                fontSize: 19,
                fontFamily: 'Calibri',
                fill: 'black',
                id: 'title'
            });
            // let subtitle = new Konva.Text({
            //     // text: element.kode_blok + " | " + element.no_unit,
            //     text: element.tipe_rumah,
            //     fontSize: 15,
            //     fontFamily: 'Calibri',
            //     fill: 'black',
            //     id: 'subtitle'
            // });
            groupBubble.add(nama_blok)
            // groupBubble.add(subtitle)
            groupBubble.show()

            // document.getElementById('activate')
        })
        poly.on('mouseleave', function (evt) {
            // console.log('leave',element.blok_id)
            let title = stage.findOne('#title')
            // let subtitle = stage.findOne('#subtitle')
            title.destroy();
            // subtitle.destroy();
            groupBubble.hide()
        })
        poly.on('mousemove', function (evt) {
            var mousePos = poly.getRelativePointerPosition()
            var x = mousePos.x;
            var y = mousePos.y;
            let title = stage.findOne('#title')
            // let subtitle = stage.findOne('#subtitle')
            groupBubble.zIndex(12)
            bubble.position({
                x: x - 25,
                y: y - 120,
            })
            title.position({
                x: x,
                y: y - 100,
            })
            // subtitle.position({
            //     x: x,
            //     y: y - 75,
            // })
            // console.log('x: ' + x + ', y: ' + y);
        })
    }

    groupPoly.add(groupBubble);
    // end disable temporer

    layerBackground.on('mousemove', function (evt) {
        var mousePos = layerBackground.getRelativePointerPosition();
        var x = mousePos.x;
        var y = mousePos.y;
    })

    stage.on('wheel', function (e) {
        e.evt.preventDefault();
        const dx = e.evt.deltaX;
        const dy = e.evt.deltaY;
        let scale = layerBackground.getAbsoluteScale();
        layerBackground.scaleX(scale.x - dy / 3000)
        layerBackground.scaleY(scale.y - dy / 3000)
    })

    var imgObj, filters = [], layer, stage;
    var scaleBy = 1.1;
    $('.STzoom_in').on('click', function (e) {
        e.preventDefault();
        // imgObj.draggable = true;
        var oldScale = stage.scaleX();
        var mousePointTo = {
            x: stage.width() / 2 / oldScale - stage.x() / oldScale,
            y: stage.height() / 2 / oldScale - stage.y() / oldScale
        };
        var newScale = oldScale * scaleBy;
        stage.scale({ x: newScale, y: newScale });
        var newPos = {
            x:
                -(mousePointTo.x - stage.width() / 2 / newScale) *
                newScale,
            y:
                -(mousePointTo.y - stage.height() / 2 / newScale) *
                newScale
        };
        stage.position(newPos);
        stage.batchDraw();
    });
    $('.STzoom_out').on('click', function (e) {
        e.preventDefault();
        // imgObj.draggable = true;
        var oldScale = stage.scaleX();
        var mousePointTo = {
            x: stage.width() / 2 / oldScale - stage.x() / oldScale,
            y: stage.height() / 2 / oldScale - stage.y() / oldScale
        };
        var newScale = oldScale / scaleBy;
        stage.scale({ x: newScale, y: newScale });
        var newPos = {
            x:
                -(mousePointTo.x - stage.width() / 2 / newScale) *
                newScale,
            y:
                -(mousePointTo.y - stage.height() / 2 / newScale) *
                newScale
        };
        stage.position(newPos);
        stage.batchDraw();
    });

    if (konva_set_points) {
        var groupPainting = new Konva.Group();
        layerBackground.add(groupPainting)
        var clickPoints = [];
        layerBackground.on('click', function (evt) {
            if (!evt.evt.altKey) {
                var mousePos = layerBackground.getRelativePointerPosition();
                var x = mousePos.x;
                var y = mousePos.y;
                console.log('x: ' + x + ', y: ' + y, evt.evt.shiftKey);

                clickPoints.push([x, y])
                drawDot(x, y)
                // infoPoints.textContent = clickPoints.join(" : ")
                if (clickPoints.length >= 3 && evt.evt.shiftKey) {
                    // set selected dat modal, after click shift
                    drawPoly(clickPoints.map((x) => x))
                    load_select()
                }
            }
        })
        function drawDot(x, y) {
            let circle = new Konva.Circle({
                // x: stage.width() / 2,
                // y: stage.height() / 2,
                radius: 0.8,
                fill: 'red',
                stroke: 'red',
                strokeWidth: 5,
                name: 'dot',
            });
            groupPainting.add(circle)
            circle.position({
                x: x,
                y: y,
            })
        }

        const drawPoly = points => {

            let poly = new Konva.Line({
                points: points.flat(),
                fill: '#00D2FF',
                stroke: 'red',
                strokeWidth: 5,
                closed: true,
                opacity: 0.25,
                id: 'painting'
            });
            groupPainting.add(poly)
            let dot = stage.find('.dot')
            dot.map(e => e.destroy())
        }

        function load_select() {
            var urltestsn = $('#cluster_id').attr('load-select');
            $.ajax({
                url: urltestsn,
            }).done(function (msg) {
                if ($('#cluster_id').hasClass("select2-hidden-accessible")) {
                    $('#cluster_id').select2('destroy');
                }
                let str = '<option value="">Pilih Cluster</option>';
                for (let index = 0; index < msg.length; index++) {
                    const el = msg[index];
                    let cluster_nm = el.nama_cluster + ' - ' + el.nama_proyek;
                    str += '<option value="' + el.id + '">' + cluster_nm + '</option>'
                }
                $('#cluster_id').html(str);
                // $('.proyek_id_hide').val($('#proyek_id').val())
                $('#cluster_id').select2({
                    dropdownParent: $('#formSubmitUnitModal')
                });
                $('#formSubmitUnitModal').modal('show')
                $('.points_hide').val(JSON.stringify(clickPoints))
            })
                .fail(function (e) {
                    alert("error");
                });
        }

        $('#formSubmitUnitModal').on('hidden.bs.modal', function (e) {
            // context.clearRect(0, 0, canvas.width, canvas.height)
            let painting = stage.findOne('#painting')
            painting.destroy()
            clickPoints = []
        })

        $('#formSubmitPoints').submit(function () {
            $.ajax({
                type: "POST",
                url: $('#formSubmitPoints').attr('action'),
                data: $('#formSubmitPoints').serialize(),
            }).done(function (msg) {
                $('#formSubmitUnitModal').modal('hide')
                showToast('Success', 'Data blok berhasil di input')
                setTimeout(() => {
                    window.location.reload()
                }, 300);
                createPoly(msg)
            })
                .fail(function (e) {
                    console.log(e)
                    alert("error");
                });
            clickPoints = []
            return false;
        })
        $('.confirm_siteplan').on('click', function name(e) {
            if (!confirm("Yakin akan meninggalkan halaman ini?")) {
                e.preventDefault();
            }
        })
    }

});

function showToast(title, text) {
    Swal.fire({
        toast: true,
        position: 'top-end',  // Posisi toast
        icon: 'success',      // Tipe icon: success, error, warning, info, question
        title: title,         // Judul toast
        text: text,           // Isi toast
        showConfirmButton: false,
        timer: 3000,  // Toast hilang setelah 3 detik
        timerProgressBar: true
    });
}