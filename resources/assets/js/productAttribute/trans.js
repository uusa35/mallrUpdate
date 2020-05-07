export const trans = (lang = 'ar') => {
    switch (lang) {
        case 'ar':
            return {
                size: 'القياس',
                choose_size: 'اختر القياس',
                choose_color: 'اختر اللون',
                color: 'اللون',
                addToCart : "أضف لعربة التسوق",
                chooseSizeThenColor  : "أختر المقاس اولا ومن ثم اللون"
            }
        case 'en' :
            return {
                size: 'Size',
                choose_size: 'Choose Size',
                choose_color: 'Choose Color',
                color: 'Color',
                addToCart : "Add To Cart",
                chooseSizeThenColor : "Choose Color Then Size"
            }
    }
}
