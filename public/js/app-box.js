
//**************************************************************************************************
// appBox
//**************************************************************************************************

class appBox {

	icon = "";
	title = "";
	image = "";
	picture = "";
	message = "";
	width = "400px";
	buttons = [];
	fogHides = false;

	buttonClick(name) {
	}

	fogClick() {
	}

	constructor(message, title) {
		// parameters
		if ( typeof(message) == "string" ) this.message = message;
		if ( typeof(title) == "string" ) this.title = title;
		// elements
		this.elms = {};
		this.elms.buttons = [];
	}

	show() {
		this.fogShow();
		this.modalShow();
		// header
		if ( this.icon != "" || this.title != "" ) {
			this.headerShow();
			if ( this.icon != "" ) this.iconShow();
			if ( this.title != "" ) this.titleShow();
			this.exitShow();
		}
		// content
		this.contentShow();
		if ( this.image != "" ) this.imageShow();
		if ( this.picture != "" || this.message != "" ) {
			this.pictureMessageShow();
			if ( this.picture != "" ) this.pictureShow();
			if ( this.message != "" ) this.messageShow();
		}
		// footer
		if (this.buttons.length > 0 ) {
			this.footerShow();
			for (var j in this.buttons) {
				this.buttonCreate(this.buttons[j]);
			}
		}
	}

	nominator(name) {
		return "app-box-" + name;
	}

	fogShow() {
		let elm = document.createElement("div");
		this.elms.fog = elm;
		elm.id = this.nominator("fog");
		Object.assign(elm.style, {
			position: "fixed",
			width: "100%",
			height: "100%",
			left: "0",
			top: "0",
			zIndex: "100500",
			display: "flex",
			justifyContent: "center",
			alignItems: "center",
			background: "rgba(0, 0, 0, 0.3)",
		});
		elm.addEventListener("click", event => this.fogListener(event));
		document.body.appendChild(elm);
	}

	modalShow() {
		let elm = document.createElement("div");
		this.elms.modal = elm;
		elm.id = this.nominator("modal");
		Object.assign(elm.style, {
			position: "absolute",
			width: this.width,
			maxWidth: "calc(100% - 0.8rem)",
			boxSizing: "border-box",
			borderRadius: "0.3rem",
			backgroundColor: "White",
			boxShadow: "5px 5px 10px Grey",
		});
		this.elms.fog.appendChild(elm);
	}

	headerShow() {
		let elm = document.createElement("div");
		this.elms.header = elm;
		elm.id = this.nominator("header");
		Object.assign(elm.style, {
			display: "flex",
			alignItems: "center",
			borderTopLeftRadius: "0.3rem",
			borderTopRightRadius: "0.3rem",
			backgroundColor: "WhiteSmoke",
			cursor: "move",
		});
		elm.addEventListener("mousedown", event => this.headerMouseDown(event));
		elm.addEventListener("mousemove", event => this.headerMouseMove(event));
		elm.addEventListener("mouseup", () => this.headerMouseUp());
		this.elms.modal.appendChild(elm);
	}

	iconShow() {
		// button
		let elm = document.createElement("button");
		this.elms.icon = elm;
		elm.id = this.nominator("icon");
		Object.assign(elm.style, {
			minWidth: "1.7rem",
			userSelect: "none",
			border: "1px solid transparent",
			color: this.icons[this.icon].color,
			backgroundColor: "transparent",
			cursor: "move",
			padding: "0",
			marginLeft: "0.4rem",
		});
		this.elms.header.appendChild(elm);
		// svg
		let elmSVG = this.svgCreate(this.icon);
		elm.appendChild(elmSVG);
	}

	titleShow() {
		let elm = document.createElement("h1");
		this.elms.title = elm;
		elm.id = this.nominator("title");
		Object.assign(elm.style, {
			overflow: "hidden",
			fontSize: "1.5rem",
			color: "DarkSlateGrey",
			marginLeft: "0.4rem",
			marginTop: "0",
			marginBottom: "0",
		});
		elm.innerHTML = this.title;
		this.elms.header.appendChild(elm);
	}

	exitShow() {
		// button
		let elm = document.createElement("button");
		this.elms.exit = elm;
		elm.id = this.nominator("exit");
		Object.assign(elm.style, {
			minWidth: "2.5rem",
			userSelect: "none",
			border: "1px solid transparent",
			color: "DimGrey",
			backgroundColor: "transparent",
			opacity: "0.85",
			cursor: "pointer",
			padding: "0.2rem 0.45rem",
			marginLeft: "auto",
		});
		elm.addEventListener("mouseover", function() { this.style.opacity = 1; });
		elm.addEventListener("mouseout", function() { this.style.opacity = 0.85; });
		elm.addEventListener("click", () => this.buttonListener("Exit"));
		this.elms.header.appendChild(elm);
		// svg
		let elmSVG = this.svgCreate("No");
		elm.appendChild(elmSVG);
	}

	contentShow() {
		let elm = document.createElement("div");
		this.elms.content = elm;
		elm.id = this.nominator("content");
		Object.assign(elm.style, {
			wordBreak: "break-word",
			maxHeight: "calc(100% - 9rem)",
			overflowY: "auto",
			margin: "0.4rem",
		});
		this.elms.modal.appendChild(elm);
	}

	imageShow() {
		let elm = document.createElement("img");
		this.elms.image = elm;
		elm.id = this.nominator("image");
		Object.assign(elm.style, {
			maxWidth: "100%",
			borderRadius: "0.3rem",
			verticalAlign: "middle",
		});
		elm.src = this.image;
		this.elms.content.appendChild(elm);
	}

	pictureMessageShow() {
		// pictureMessage
		let elm = document.createElement("div");
		this.elms.pictureMessage = elm;
		elm.id = this.nominator("pictureMessage");
		Object.assign(elm.style, {
			display: "flex",
			flexDirection: "row",
			alignItems: "center",
			minHeight: "2rem",
		});
		if ( this.image != "" ) {
			elm.style.marginTop = "0.35rem";
		}
		this.elms.content.appendChild(elm);
	}

	pictureShow() {
		// picture
		let elm = document.createElement("div");
		this.elms.picture = elm;
		elm.id = this.nominator("picture");
		Object.assign(elm.style, {
			minWidth: "4rem",
			margin: "1rem",
			color: this.icons[this.picture].color,
		});
		this.elms.pictureMessage.appendChild(elm);
		// svg
		let elmSVG = this.svgCreate(this.picture);
		elm.appendChild(elmSVG);
	}

	messageShow() {
		// message
		let elm = document.createElement("div");
		this.elms.message = elm;
		elm.id = this.nominator("message");
		Object.assign(elm.style, {
			fontSize: "1.1rem",
			width: "100%",
			marginRight: "0.4rem",
		});
		elm.innerHTML = this.message;
		this.elms.pictureMessage.appendChild(elm);
	}

	footerShow() {
		let elm = document.createElement("div");
		this.elms.footer = elm;
		elm.id = this.nominator("footer");
		Object.assign(elm.style, {
			display: "flex",
			justifyContent: "flex-end",
			flexWrap: "wrap",
			borderBottomLeftRadius: "0.3rem",
			borderBottomRightRadius: "0.3rem",
			backgroundColor: "WhiteSmoke",
			padding: "0.2rem",
		});
		this.elms.modal.appendChild(elm);
	}

	//----------------------------------------------------------------------------------------------

	// "height" - for button's svg only
	icons = {
		"Info": {
			"height":"1.5rem", "x":512, "y":512, "color":"DodgerBlue", "d":"M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"
		},
		"Question": {
			"height":"1.5rem", "x":512, "y":512, "color":"MediumSeaGreen", "d":"M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z"
		},
		"Danger": {
			"height":"1.5rem", "x":512, "y":512, "color":"Tomato", "d":"M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"
		},
		"OK": {
			"height":"1.5rem", "x":512, "y":512, "color":"DodgerBlue", "d":"M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
		},
		"Yes": {
			"height":"1.5rem", "x":512, "y":512, "color":"MediumSeaGreen", "d":"M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
		},
		"No": {
			"height":"1.6rem", "x":352, "y":512, "color":"Grey", "d":"M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"
		},
		"Trash": {
			"height":"1.4rem", "x":448, "y":512, "color":"Tomato", "d":"M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"
		},
		"User": {
			"height":"1.4rem", "x":448, "y":512, "color":"SteelBlue", "d":"M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"
		},
		"In": {
			"height":"1.5rem", "x":512, "y":512, "color":"MediumSeaGreen", "d":"M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"
		},
		"Out": {
			"height":"1.5rem", "x":512, "y":512, "color":"Orange", "d":"M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"
		},
		"Save": {
			"height":"1.5rem", "x":448, "y":512, "color":"CadetBlue", "d":"M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM272 80v80H144V80h128zm122 352H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h42v104c0 13.255 10.745 24 24 24h176c13.255 0 24-10.745 24-24V83.882l78.243 78.243a6 6 0 0 1 1.757 4.243V426a6 6 0 0 1-6 6zM224 232c-48.523 0-88 39.477-88 88s39.477 88 88 88 88-39.477 88-88-39.477-88-88-88zm0 128c-22.056 0-40-17.944-40-40s17.944-40 40-40 40 17.944 40 40-17.944 40-40 40z"
		},
		"Cancel": {
			"height":"1.5rem", "x":512, "y":512, "color":"Grey", "d":"M256 8C119.034 8 8 119.033 8 256s111.034 248 248 248 248-111.034 248-248S392.967 8 256 8zm130.108 117.892c65.448 65.448 70 165.481 20.677 235.637L150.47 105.216c70.204-49.356 170.226-44.735 235.638 20.676zM125.892 386.108c-65.448-65.448-70-165.481-20.677-235.637L361.53 406.784c-70.203 49.356-170.226 44.736-235.638-20.676z"
		},
		"Close": {
			"height":"1.5rem", "x":512, "y":512, "color":"DarkGrey", "d":"M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"
		},
		"Unknown": {
			"height":"1.2rem", "x":512, "y":512, "color":"RosyBrown", "d":"M478.21 334.093L336 256l142.21-78.093c11.795-6.477 15.961-21.384 9.232-33.037l-19.48-33.741c-6.728-11.653-21.72-15.499-33.227-8.523L296 186.718l3.475-162.204C299.763 11.061 288.937 0 275.48 0h-38.96c-13.456 0-24.283 11.061-23.994 24.514L216 186.718 77.265 102.607c-11.506-6.976-26.499-3.13-33.227 8.523l-19.48 33.741c-6.728 11.653-2.562 26.56 9.233 33.037L176 256 33.79 334.093c-11.795 6.477-15.961 21.384-9.232 33.037l19.48 33.741c6.728 11.653 21.721 15.499 33.227 8.523L216 325.282l-3.475 162.204C212.237 500.939 223.064 512 236.52 512h38.961c13.456 0 24.283-11.061 23.995-24.514L296 325.282l138.735 84.111c11.506 6.976 26.499 3.13 33.227-8.523l19.48-33.741c6.728-11.653 2.563-26.559-9.232-33.036z"
		},
	};

	svgCreate(name) {
		if ( !this.icons.hasOwnProperty(name) ) {
			name = "Unknown";
		}
		let elm = document.createElementNS("http://www.w3.org/2000/svg", "svg");
		elm.setAttributeNS(null, "viewBox", "0 0 " + this.icons[name].x + " " + this.icons[name].y);
		elm.setAttributeNS(null, "fill", "currentColor");
	    let path = document.createElementNS(elm.namespaceURI, "path");
	    path.setAttribute("d", this.icons[name].d);
    	elm.appendChild(path);
		Object.assign(elm.style, {
			verticalAlign: "middle",
		});
		return elm;
	}

	buttonCreate(name) {
		if ( this.icons.hasOwnProperty(name) ) {
			var buttonName = name;
		}
		else {
			var buttonName = "Unknown";
		}
		// button
		let elm = document.createElement("button");
		this.elms.buttons[name] = elm;
		elm.id = this.nominator("button-" + name);
		Object.assign(elm.style, {
			cursor: "pointer",
			userSelect: "none",
			fontSize: "1.1rem",
			minWidth: "4rem",
			lineHeight: "1.6",
			border: "none",
			borderRadius: "0.3rem",
			color: "White",
			backgroundColor: this.icons[buttonName].color,
			opacity: "0.9",
			padding: "0.2rem 0.6rem",
			margin: "0.2rem",
		});
		elm.addEventListener("mouseover", function() { this.style.opacity = 1; });
		elm.addEventListener("mouseout", function() { this.style.opacity = 0.9; });
		elm.addEventListener("click", () => this.buttonListener(name));
		this.elms.footer.appendChild(elm);
		// svg
		let elmSVG = this.svgCreate(buttonName);
		Object.assign(elmSVG.style, {
			height: this.icons[buttonName].height,
			paddingRight: "0.3rem",
			paddingBottom: "0.15rem",
		});
		elm.appendChild(elmSVG);
		// span
		let elmSpan = document.createElement("span");
		elmSpan.innerHTML = name;
		elm.appendChild(elmSpan);
	}

	buttonListener(name) {
		this.hide();
		this.buttonClick(name);
	}

	fogListener(event) {
		if ( event.target == this.elms.fog ) {
			if ( this.fogHides ) { this.hide(); }
			this.fogClick();
		}
	}

	//----------------------------------------------------------------------------------------------
	// Modal moving
	//----------------------------------------------------------------------------------------------

	moveObject = null;

	headerMouseDown(event) {
		if ( event.target !== this.elms.exit && event.target.parentElement !== this.elms.exit && event.target.parentElement.parentElement !== this.elms.exit ) {
			this.moveObject = {};
			// Modal's coordinates at click on Header
			var rect = this.elms.modal.getBoundingClientRect();
			this.moveObject.headerX = rect.left;
			this.moveObject.headerY = rect.top;
			// Mouse's coordinates at click on Header
			this.moveObject.mouseX = event.clientX;
			this.moveObject.mouseY = event.clientY;
		}
	}

	headerMouseMove(event) {
		if ( this.moveObject === null ) return;
		this.elms.modal.style.left = (this.moveObject.headerX - this.moveObject.mouseX + event.clientX) + "px";
		this.elms.modal.style.top = (this.moveObject.headerY - this.moveObject.mouseY + event.clientY) + "px";
	}

	headerMouseUp() {
		this.moveObject = null;
	}

	//----------------------------------------------------------------------------------------------

	hide() {
		this.elms.fog.remove();
	}

} // class appBox

//**************************************************************************************************
