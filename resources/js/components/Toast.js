const Toast = () => {
    return {
        isShow: true,
        
        hide() {
            this.isShow = false;
        },
        init() {
            setTimeout(() => {
                this.isShow = false;
            }, 5000);
        }
        
    }
}

export default Toast;