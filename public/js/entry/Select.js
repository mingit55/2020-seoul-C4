class Select extends Tool {
    constructor(){
        super(...arguments);
    }   

    onmousedown(e){
        let target = this.getMouseTarget(e);
        if(target){
            let [x, y] = this.getXY(e);
            target.active = true;
            this.selected = target;

            this.beforeXY = [target.x, target.y];
            this.downXY = [x, y];
        } else {
            this.unselectAll();
        }
    }

    onmousemove(e){
        if(!this.selected) return;
        
        let [x, y] = this.getXY(e);
        let [dx, dy] = this.downXY;
        let [bx, by] = this.beforeXY;
        
        this.selected.x = bx + x - dx;
        this.selected.y = by + y - dy;
    }
}