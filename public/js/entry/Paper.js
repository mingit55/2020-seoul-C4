class Paper {
    constructor(src){
        this.src = src;
        this.active = false;
        this.x = 0;
        this.y = 0;

        this.canvas = document.createElement("canvas");
        this.canvas.width = this.src.width;
        this.canvas.height = this.src.height;
        this.ctx = this.canvas.getContext("2d");

        this.sliced = document.createElement("canvas");
        this.sliced.width = this.src.width;
        this.sliced.height = this.src.height;
        this.sctx = this.sliced.getContext("2d");

    }

    update(){
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        
        if(this.active) this.ctx.putImageData(this.src.borderData, 0, 0);
        else this.ctx.putImageData(this.src.imageData, 0, 0);

        this.ctx.drawImage(this.sliced, 0, 0);
    }

    recalculate(){
        let [X, Y, W, H] = this.src.getSize();
        let copy = new Source( new ImageData(w, h) );
        
        for(let y = Y; y < Y + H; y ++){
            for(let x = X; x < X + W; x ++){
                copy.setColor(x, y, this.getColor(x, y));
            }
        }
    
        copy.borderData = copy.getBorderData();

        this.x += X;
        this.y += Y;
        this.canvas.width = W;
        this.canvas.height = H;
        
        let slicedData = this.sctx.getImageData(0, 0, this.sliced.width, this.sliced.height);
        this.sliced.width = W;
        this.sliced.height = H;
        this.sctx.putImageData(slicedData, X, Y);
        
        
    }
}