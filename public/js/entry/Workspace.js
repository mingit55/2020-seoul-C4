class Workspace {
    constructor(app){
        this.app = app;
        this.papers = [];

        this.selectedName = "";
        this.tools = {
            select: new Select(this),
            spin: new Spin(this),
            cut: new Cut(this),
            glue: new Glue(this),
        };
        
        this.canvas = $("#workspace canvas")[0];
        this.ctx = this.canvas.getContext("2d");

        this.sliced = document.createElement("canvas");
        this.sliced.width = this.canvas.width;
        this.sliced.height = this.canvas.height;
        this.sctx = this.sliced.getContext("2d");

        this.render();
        this.setEvents();
    }

    get selectedTool(){
        return this.tools[this.selectedName];
    }    

    async pushPaper({image, width_size, height_size}){
        let img = await new Promise(res => {
            let img = new Image();
            img.src = image;
            img.onload = () => res(img);
        });

        let canvas = document.createElement("canvas");
        canvas.width = width_size;
        canvas.height = height_size;
        let ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, width_size, height_size);
        
        let src = new Source( ctx.getImageData(0, 0, width_size, height_size) );
        this.papers.push( new Paper( src ) );
    }

    
    render(){
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

        this.papers.forEach(paper => {
            paper.update();
            this.ctx.drawImage(paper.canvas, paper.x, paper.y);
        });
        
        requestAnimationFrame(() => this.render());
    }

    setEvents(){
        $(window).on("mousedown", e => {
            if(!this.selectedTool || e.which !== 1) return false;
            this.selectedTool.onmousedown && this.selectedTool.onmousedown(e);
        });
        $(window).on("mousemove", e => {
            if(!this.selectedTool || e.which !== 1) return false;
            this.selectedTool.onmousemove && this.selectedTool.onmousemove(e);
        });
        $(window).on("mouseup", e => {
            if(!this.selectedTool || e.which !== 1) return false;
            this.selectedTool.onmouseup && this.selectedTool.onmouseup(e);
        });
        $(window).on("click", e => {
            if(!this.selectedTool || e.which !== 1) return false;
            this.selectedTool.click && this.selectedTool.click(e);
        });
        $(window).on("dblclick", e => {
            if(!this.selectedTool || e.which !== 1) return false;
            this.selectedTool.ondblclick && this.selectedTool.ondblclick(e);
        });
        $(window).on("contextmenu", e => {
            if(!this.selectedTool || e.which !== 1) return false;
            this.selectedTool.oncontextmenu && this.selectedTool.oncontextmenu(this.app.makeContextMenu);
        });
    }
}