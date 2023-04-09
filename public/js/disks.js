
Vue.createApp({
    data() {
        return {
            crud: {
                rows: [],
                rowSelected: 0,
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
            },
        }
    },
    created: function() {
    },
    mounted: function() {
        this.rowsLoad();
    },
    computed: {
    },
    methods: {
        ////////////////////////////////////////////////////////////////////////////////////////////
        // Зарузка rows
        ////////////////////////////////////////////////////////////////////////////////////////////
        rowsLoad() {
            var pg = this.crud.paginator;
            var url = '/api/disks';
            url += '?per_page=' + pg.per_page;
            url += '&page=' + pg.page;
            url += '&search=' + this.crud.search.trim();
            axios
                .get(url)
                .then(response => {
                    var rd = response.data;
                    this.crud.rows = rd.data;
                    pg.current_page = rd.current_page;
                    pg.last_page = rd.last_page;
                    pg.per_page = rd.per_page;
                    pg.total = rd.total;
                    pg.page = rd.current_page;
                    pg.pages = [];
                    for (var i=0; i<rd.last_page; i++ ) {
                        pg.pages.push(i+1);
                    }
                });
        },
        ////////////////////////////////////////////////////////////////////////////////////////////
        // Выделение строки - Style
        ////////////////////////////////////////////////////////////////////////////////////////////
        rowSelectedStyle(crudName, row, fieldName) {
            if ( row[fieldName] == this[crudName].rowSelected ) {
                return true;
            }
            else {
                return false;
            }
        },
        ////////////////////////////////////////////////////////////////////////////////////////////
        // Выделение строки - Click
        ////////////////////////////////////////////////////////////////////////////////////////////
        rowSelectedClick(crudName, row, fieldName) {
            this[crudName].rowSelected = row[fieldName];
        },
        ////////////////////////////////////////////////////////////////////////////////////////////
        // Пагинация
        ////////////////////////////////////////////////////////////////////////////////////////////
        paginate(mode) {
            var pg = this.crud.paginator;
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
            this.crud.rows.push({'disk_id':'111', 'artist_name':'hbenbetbe', 'disk_name':'rnrtn', 'disk_note':'thrthrth'});
            console.log(this.crud.rows);
        },
        ////////////////////////////////////////////////////////////////////////////////////////////
        // Правка
        ////////////////////////////////////////////////////////////////////////////////////////////
        btnEditOnClick() {
            console.log(this.crud.paginator);
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
