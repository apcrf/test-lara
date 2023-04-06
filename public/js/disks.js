
Vue.createApp({
    data() {
        return {
            rows: [],
            search: '',
            paginator: {
                'current_page': 1, // Текущая страница
                'last_page': 0, // Последняя страница
                'per_page': 50, // Записей на странице
                'per_pages': [20,50,100,500],
                'total': 0, // Записей всего
                'page': 1, // Выбранная для загрузки страница
                'pages': [] // Список страниц
            }
        }
    },
    created: function() {
    },
    mounted: function() {
        this.rowsLoad();
    },
    methods: {
        ////////////////////////////////////////////////////////////////////////////////////////////
        // Зарузка rows
        ////////////////////////////////////////////////////////////////////////////////////////////
        rowsLoad() {
            var url = '/api/disks';
            url += '?per_page=' + this.paginator.per_page;
            url += '&page=' + this.paginator.page;
            url += '&search=' + this.search.trim();
            axios
                .get(url)
                .then(response => {
                    var rd = response.data;
                    this.rows = rd.data;
                    this.paginator.current_page = rd.current_page;
                    this.paginator.last_page = rd.last_page;
                    this.paginator.per_page = rd.per_page;
                    this.paginator.total = rd.total;
                    this.paginator.page = rd.current_page;
                    this.paginator.pages = [];
                    for (var i=0; i<rd.last_page; i++ ) {
                        this.paginator.pages.push(i+1);
                    }
                });
        },
        ////////////////////////////////////////////////////////////////////////////////////////////
        // Пагинация
        ////////////////////////////////////////////////////////////////////////////////////////////
        paginate(mode) {
            var pg = this.paginator;
            switch (mode) {
                case "first" : pg.page = 1; break;
                case "prev" : pg.page > 1 ? pg.page-- : pg.page = 1; break;
                case "next" : pg.page < pg.last_page ? pg.page++ : pg.page = pg.last_page; break;
                case "last" : pg.page = pg.last_page; break;
                case "per_page" : pg.page = 1; break;
                default : break;
            }
            this.rowsLoad();
        },
        ////////////////////////////////////////////////////////////////////////////////////////////
        // Добавление
        ////////////////////////////////////////////////////////////////////////////////////////////
        btnAddOnClick() {
            this.rows.push({'disk_id':'111', 'artist_name':'hbenbetbe', 'disk_name':'rnrtn', 'disk_note':'thrthrth'});
            console.log(this.rows);
        },
        ////////////////////////////////////////////////////////////////////////////////////////////
        // Правка
        ////////////////////////////////////////////////////////////////////////////////////////////
        btnEditOnClick() {
            console.log(this.paginator);
        },
        ////////////////////////////////////////////////////////////////////////////////////////////
        // Удаление
        ////////////////////////////////////////////////////////////////////////////////////////////
        btnDelOnClick(id) {
            var aBox = new appBox();
            aBox.picture = "Trash";
            aBox.message = "<big>Удалить запись?</big><br><small>Это действие необратимо.</small>";
            aBox.buttons = ["Trash", "Cancel"];
            aBox.buttonClick = function(name) {
                if (name == "Trash") {
                    location.href = "/disks/del/" + id;
                }
            }
            aBox.show();
            // Customization (after .show())
            aBox.elms.footer.style.backgroundColor = "White";
            aBox.elms.picture.style.minWidth = "2.5rem";
            aBox.elms.picture.style.color = "Grey";
            aBox.elms.buttons.Trash.innerHTML = "Удалить";
            aBox.elms.buttons.Cancel.innerHTML = "Отмена";
        }
    }
}).mount('#app');

//**************************************************************************************************
// Синхронизация горизонтального скроллинга в CRUD
//**************************************************************************************************

function crudSynchroScroll(event) {
	var elmTbody = event.target; // div-список
	var elmThead = event.target.previousElementSibling; // div-заголовок
	elmThead.scrollLeft = elmTbody.scrollLeft;
}
