



const Input=(props)=>{
return(
<div  >
   
<input type={props.Type} className={props.className} id={props.id} placeholder={props.placeholder} style={props.style}   onChange={props.onChange} value={props.value} />


</div>
)


}
export default Input;