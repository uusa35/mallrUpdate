import React, {useState, useEffect, useCallback, useMemo} from 'react'
import {trans} from "./trans";
import axios from 'axios';
import {filter, first, map, uniqBy, isEmpty} from 'lodash'

const ProductAttributeApp = () => {
    const [lang, setLang] = useState(document.getElementById('appLang').value)
    const [productId, setProductId] = useState(document.getElementById('product_id').value)
    const [currentLang, setCurrentLang] = useState(trans(lang));
    const [attributes, setAttributes] = useState([]);
    const [colors, setColors] = useState([]);
    const [sizes, setSizes] = useState([]);
    const [currentAttribute, setCurrentAttribute] = useState([]);
    const [currentColor, setCurrentColor] = useState([]);
    const [currentSize, setCurrentSize] = useState([])
    const [colorDisabled, setColorDisabled] = useState(true);

    useEffect(() => {
        axios.post(`/api/attributes`, {product_id: productId})
            .then(r => {
                    setAttributes(r.data)
                document.getElementById(`add_to_cart_${productId}`).setAttribute('disabled', 'disabled');
            })
            .catch(e => console.log('e', e))
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
        handleColorClick(first(filteredColors).id)
        setColorDisabled(false);
        document.getElementById(`size_id_${productId}`).setAttribute('value', id);

    })

    const handleColorClick = useCallback((id) => {
        setCurrentColor(id)
        const attribute = first(filter(attributes, (a => a.color.id === id && a.size.id === currentSize)));
        if (!isEmpty(attribute)) {
            setCurrentAttribute(attribute)
        }
    })

    useMemo(() => {
        if (!isEmpty(currentAttribute)) {
            const {color, size, qty} = currentAttribute;
            document.getElementById(`color_id_${productId}`).setAttribute('value', color.id);
            // document.getElementById(`qty_${productId}`).setAttribute('value', 1);
            document.getElementById(`product_attribute_id_${productId}`).setAttribute('value', currentAttribute.id);
            document.getElementById(`max-qty-${productId}`).setAttribute('size', qty);
            document.getElementById(`max-qty-${productId}`).setAttribute('value', 1);
            document.getElementById(`add_to_cart_${productId}`).removeAttribute('disabled');
            document.getElementById(`minus-btn-${productId}`).removeAttribute('disabled');
            document.getElementById(`plus-btn-${productId}`).removeAttribute('disabled');
        } else {
            document.getElementById(`color_id_${productId}`).setAttribute('value', null);
            // document.getElementById(`qty_${productId}`).setAttribute('value', 1);
            document.getElementById(`product_attribute_id_${productId}`).setAttribute('value', null);
            document.getElementById(`max-qty-${productId}`).setAttribute('size', 0);
            document.getElementById(`max-qty-${productId}`).setAttribute('value', 1);
            document.getElementById(`add_to_cart_${productId}`).setAttribute('disabled', 'disabled');
            document.getElementById(`minus-btn-${productId}`).setAttribute('disabled', 'disabled');
            document.getElementById(`plus-btn-${productId}`).setAttribute('disabled', 'disabled');

        }
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
