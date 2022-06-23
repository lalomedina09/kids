const goal_answer = `
<tr>
    <td class="text-center">
        <span class="fa fa-2x fa-times goal-answers-remove" title="Quitar meta"></span>
    </td>
    <td class="text-center">
        <textarea name="m[<%= answer.index %>][m]"
            class="form-control exercise-answer exercise-answer-text"
            rows="3"></textarea>
    </td>
    <td class="text-center">
        <input type="number" name="m[<%= answer.index %>][t]"
            class="form-control exercise-answer exercise-answer-number"
            min="1" step="1">
        <p>meses</p>
    </td>
    <td class="text-center">
        <input type="number" name="m[<%= answer.index %>][c]"
            class="form-control exercise-answer exercise-answer-number"
            min="1" step="1">
        <p>pesos</p>
    </td>
</tr>
`;

export default goal_answer;
