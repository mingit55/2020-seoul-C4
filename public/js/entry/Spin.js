class Spin extends Tool {
    constructor(){
        super(...arguments);
    }   

    ondblclick(e){
        let target = this.getMouseTarget(e);

        if(target && this.selected !== target){
            target.active = true;   
            this.selected = target;
            this.selected.recalculate();
        }
    }

    onmousedown(){
        if(!this.selected) return false;

        this.image = document.createElement("canvas");
        this.image.width = this.selected.src.width;
        this.image.height = this.selected.src.height;
        let ictx = this.image.getContext("2d");
        ictx.putImageData(this.selected.src.imageData, 0, 0);

        this.sliced = document.createElement("canvas");
        this.sliced.width = this.selected.sliced.width;
        this.sliced.height = this.selected.sliced.height;
        let sctx = this.sliced.getContext("2d");
        sctx.drawImage(this.selected.sliced);

        let [,,W,H] = this.selected.src.getSize();
        let wantSize = Math.sqrt(Math.pow(W, 2), Math.pow(H, 2));
        let moveX = (wantSize - this.image.width) / 2;
        let moveY = (wantSize - this.image.height) / 2;
        
        this.selected.canvas.width = wantSize;
        this.selected.canvas.height = wantSize;
        
        this.sliced.canvas.width = wantSize;
        this.sliced.canvas.height = wantSize;
    }

    onmousemove(){

    }
}