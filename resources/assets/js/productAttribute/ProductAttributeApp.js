import React, {useState, useEffect, useCallback, useMemo} from 'react'
import {trans} from "./trans";
import axios from 'axios';
import {filter, first, map, uniqBy, isEmpty, sum} from 'lodash'
import $ from 'jquery'

const ProductAttributeApp = () => {
    const [lang, setLang] = useState($('#appLang').val())
    const [productId, setProductId] = useState($('#product_id').val())
    const [currentLang, setCurrentLang] = useState(trans(lang));
    const [attributes, setAttributes] = useState([]);
    const [colors, setColors] = useState([]);
    const [sizes, setSizes] = useState([]);
    const [currentAttribute, setCurrentAttribute] = useState([]);
    const [currentColor, setCurrentColor] = useState([]);
    const [currentSize, setCurrentSize] = useState([])
    const [colorDisabled, setColorDisabled] = useState(true);

    useEffect(() => {
        $(document).ready(() => {
            axios.post(`/api/attributes`, {product_id: productId})
                .then(r => {
                    setAttributes(r.data)
                    $(`#add_to_cart_${productId}`).attr('disabled', 'disabled');
                })
                .catch(e => console.log('e', e))
            // let qty = $(`#qty_${productId}`);
            // const currentQty = $(`#qty_${productId}`).attr('value');
            // const maxSize = $(`#max-qty-${productId}`).attr('max');
            // $(`[id^=plus-btn]`).on('click', function() {
            //     const newQty = parseInt(sum([currentQty, 1]));
            //     console.log('newqty', newQty)
            //     console.log('maxSize', maxSize)
            //     if (newQty <= maxSize) {
            //         console.log('form inside if')
            //         $(`#qty_${productId}`).attr('value', newQty);
            //         $(`#max-qty-${productId}`).attr('value', newQty);
            //     }
            // })
            //
            // $(`[id^=minus-btn]`).on('click', function() {
            //     const newQty = sum([currentQty, -1]);
            //     if (newQty <= maxSize && newQty > 0) {
            //         $(`#qty_${productId}`).attr('value', newQty);
            //         $(`#max-qty-${productId}`).attr('value', newQty);
            //     }
            // })
        })
    }, [])

    useMemo(() => {
        if (!isEmpty(attributes)) {
            const colors = map(uniqBy(attributes, 'color.id'), 'color');
            const sizes = map(uniqBy(attributes, 'size.id'), 'size');
            setColors(colors);
            setSizes(sizes);
        }
    }, [attributes])

    const handleSizeClick = useCallback((id) => {
        setCurrentSize(id)
        setCurrentAttribute(null)
        const filteredAttributes = filter(attributes, (a => a.size.id === id))
        const filteredColors = map(filteredAttributes, 'color');
        setColors(filteredColors);
        const firstColor = first(filteredColors);
        handleColorClick(firstColor.id)
        const attribute = first(filter(attributes, (a => a.color.id === firstColor.id && a.size.id === currentSize)));
        setCurrentAttribute(attribute)
        setColorDisabled(false);
        $(`#size_id_${productId}`).attr('value', id);
        $('#alertCartMessage').removeClass('d-none');
    })

    const handleColorClick = useCallback((id) => {
        setCurrentColor(id)
        const attribute = first(filter(attributes, (a => a.color.id === id && a.size.id === currentSize)));
        if (!isEmpty(attribute)) {
            setCurrentAttribute(attribute)
        }
    }, [currentColor])

    useEffect(() => {
        $(document).ready(() => {
            if (!isEmpty(currentAttribute)) {
                const {color, qty} = currentAttribute;
                $(`#color_id_${productId}`).attr('value', color.id);
                // const newQty = sum([$`#qty_${productId}`).getAttribute('value'),1]);
                $(`#qty_${productId}`).attr('value', 1);
                $(`#product_attribute_id_${productId}`).attr('value', currentAttribute.id);
                $(`#max-qty-${productId}`).attr('size', qty);
                $(`#max-qty-${productId}`).attr('value', 1);
                $(`#max-qty-${productId}`).attr('placeholder', 1);
                $(`#minus-btn-${productId}`).removeAttr('disabled');
                $(`#plus-btn-${productId}`).removeAttr('disabled');
                $(`#add_to_cart_${productId}`).removeAttr('disabled');
            } else {
                $(`#color_id_${productId}`).attr('value', null);
                $(`#qty_${productId}`).attr('value', 0);
                $(`#max-qty-${productId}`).removeAttr('size');
                $(`#max-qty-${productId}`).attr('placeholder',1);
                $(`#max-qty-${productId}`).attr('value',1);
                $(`#product_attribute_id_${productId}`).attr('value', null)
                $(`#add_to_cart_${productId}`).attr('disabled', 'disabled');
                $(`#minus-btn-${productId}`).attr('disabled', 'disabled');
                $(`#plus-btn-${productId}`).attr('disabled', 'disabled');

            }
        });
    }, [currentAttribute])

    return (
        <div className="tt-swatches-container">
            <div className="tt-wrapper">
                <div className="tt-title-options">{currentLang.size}</div>
                <ul className="tt-options-swatch options-large">
                    {
                        map(sizes, (e, i) =>
                            <li key={i} className={`${currentSize === e.id ? 'active' : ''}`}>
                                <a style={{width: 80}} onClick={() => handleSizeClick(e.id)}><strong>{e.name}</strong>
                                </a>
                            </li>
                        )
                    }
                </ul>
            </div>
            <div className="tt-wrapper">
                <div className="tt-title-options">{currentLang.choose_color}:</div>
                <ul className="tt-options-swatch options-large">
                    {
                        map(colors, (e, i) => (
                            <li key={i}
                                className={`${currentColor === e.id ? 'active' : ''}`}>
                                <a
                                    disabled={colorDisabled} className="options-color tooltip"
                                    data-tooltip={`${currentSize ? currentLang.chooseSizeThenColor : ''}`}
                                    onClick={() => handleColorClick(e.id)} style={{backgroundColor: e.code}}></a>
                            </li>
                        ))
                    }
                </ul>
            </div>
        </div>
    );
}

export default ProductAttributeApp;
