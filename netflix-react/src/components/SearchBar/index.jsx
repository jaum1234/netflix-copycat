import { useState } from "react";
import { FaSearch, FaTimes } from "react-icons/fa";

import './style.css'

export default function SearchBar(props)
{
    const [input, setInput] = useState(false);
    const [search, setSearch] = useState('');

    const toggleInput = () => setInput(!input);
    const handleChange = (event) => setSearch(event.target.value); 

    return(
        <div className="search">
            <FaSearch size={ 20 } onClick={ toggleInput } className="search__icon search__icon--search"/>
            <input 
                type="search"
                className="search__input"
                placeholder="Title, people, genres" 
                value={ search } 
                style={ input ? { display: "inline-block" } : { display: "none" } } 
                onChange={ handleChange }/> 
        </div>
    )
}